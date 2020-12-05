<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::with(['category', 'sub_category', 'approved_by', 'created_by', 'media'])->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sub_categories = SubCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.products.create', compact('categories', 'sub_categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());

        foreach ($request->input('imagaes', []) as $file) {
            $product->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('imagaes');
        }

        foreach ($request->input('videos', []) as $file) {
            $product->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('videos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $product->id]);
        }

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sub_categories = SubCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product->load('category', 'sub_category', 'approved_by', 'created_by');

        return view('admin.products.edit', compact('categories', 'sub_categories', 'product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());

        if (count($product->imagaes) > 0) {
            foreach ($product->imagaes as $media) {
                if (!in_array($media->file_name, $request->input('imagaes', []))) {
                    $media->delete();
                }
            }
        }

        $media = $product->imagaes->pluck('file_name')->toArray();

        foreach ($request->input('imagaes', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $product->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('imagaes');
            }
        }

        if (count($product->videos) > 0) {
            foreach ($product->videos as $media) {
                if (!in_array($media->file_name, $request->input('videos', []))) {
                    $media->delete();
                }
            }
        }

        $media = $product->videos->pluck('file_name')->toArray();

        foreach ($request->input('videos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $product->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('videos');
            }
        }

        return redirect()->route('admin.products.index');
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->load('category', 'sub_category', 'approved_by', 'created_by');

        return view('admin.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('product_create') && Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Product();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
