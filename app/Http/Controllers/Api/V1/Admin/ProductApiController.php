<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\Admin\ProductResource;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductResource(Product::with(['category', 'sub_category', 'approved_by', 'created_by'])->get());
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());

        if ($request->input('imagaes', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . $request->input('imagaes')))->toMediaCollection('imagaes');
        }

        if ($request->input('videos', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . $request->input('videos')))->toMediaCollection('videos');
        }

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductResource($product->load(['category', 'sub_category', 'approved_by', 'created_by']));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());

        if ($request->input('imagaes', false)) {
            if (!$product->imagaes || $request->input('imagaes') !== $product->imagaes->file_name) {
                if ($product->imagaes) {
                    $product->imagaes->delete();
                }

                $product->addMedia(storage_path('tmp/uploads/' . $request->input('imagaes')))->toMediaCollection('imagaes');
            }
        } elseif ($product->imagaes) {
            $product->imagaes->delete();
        }

        if ($request->input('videos', false)) {
            if (!$product->videos || $request->input('videos') !== $product->videos->file_name) {
                if ($product->videos) {
                    $product->videos->delete();
                }

                $product->addMedia(storage_path('tmp/uploads/' . $request->input('videos')))->toMediaCollection('videos');
            }
        } elseif ($product->videos) {
            $product->videos->delete();
        }

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
