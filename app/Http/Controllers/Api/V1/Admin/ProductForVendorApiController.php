<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProductForVendorRequest;
use App\Http\Requests\UpdateProductForVendorRequest;
use App\Http\Resources\Admin\ProductForVendorResource;
use App\Models\ProductForVendor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductForVendorApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('product_for_vendor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductForVendorResource(ProductForVendor::with(['category', 'sub_category', 'tags', 'approved_by', 'created_by'])->get());
    }

    public function store(StoreProductForVendorRequest $request)
    {
        $productForVendor = ProductForVendor::create($request->all());
        $productForVendor->tags()->sync($request->input('tags', []));

        if ($request->input('imagaes', false)) {
            $productForVendor->addMedia(storage_path('tmp/uploads/' . $request->input('imagaes')))->toMediaCollection('imagaes');
        }

        if ($request->input('videos', false)) {
            $productForVendor->addMedia(storage_path('tmp/uploads/' . $request->input('videos')))->toMediaCollection('videos');
        }

        return (new ProductForVendorResource($productForVendor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProductForVendor $productForVendor)
    {
        abort_if(Gate::denies('product_for_vendor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductForVendorResource($productForVendor->load(['category', 'sub_category', 'tags', 'approved_by', 'created_by']));
    }

    public function update(UpdateProductForVendorRequest $request, ProductForVendor $productForVendor)
    {
        $productForVendor->update($request->all());
        $productForVendor->tags()->sync($request->input('tags', []));

        if ($request->input('imagaes', false)) {
            if (!$productForVendor->imagaes || $request->input('imagaes') !== $productForVendor->imagaes->file_name) {
                if ($productForVendor->imagaes) {
                    $productForVendor->imagaes->delete();
                }

                $productForVendor->addMedia(storage_path('tmp/uploads/' . $request->input('imagaes')))->toMediaCollection('imagaes');
            }
        } elseif ($productForVendor->imagaes) {
            $productForVendor->imagaes->delete();
        }

        if ($request->input('videos', false)) {
            if (!$productForVendor->videos || $request->input('videos') !== $productForVendor->videos->file_name) {
                if ($productForVendor->videos) {
                    $productForVendor->videos->delete();
                }

                $productForVendor->addMedia(storage_path('tmp/uploads/' . $request->input('videos')))->toMediaCollection('videos');
            }
        } elseif ($productForVendor->videos) {
            $productForVendor->videos->delete();
        }

        return (new ProductForVendorResource($productForVendor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProductForVendor $productForVendor)
    {
        abort_if(Gate::denies('product_for_vendor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productForVendor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
