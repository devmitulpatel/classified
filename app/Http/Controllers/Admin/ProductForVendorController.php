<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductForVendorRequest;
use App\Http\Requests\StoreProductForVendorRequest;
use App\Http\Requests\UpdateProductForVendorRequest;
use App\Models\ArticleTag;
use App\Models\CategoriesForAdmin;
use App\Models\ProductForVendor;
use App\Models\SubCategoryForAdmin;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProductForVendorController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('product_for_vendor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productForVendors = ProductForVendor::with(['category', 'sub_category', 'tags', 'approved_by', 'created_by', 'media'])->get();

        return view('admin.productForVendors.index', compact('productForVendors'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_for_vendor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = CategoriesForAdmin::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sub_categories = SubCategoryForAdmin::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tags = ArticleTag::all()->pluck('name', 'id');

        return view('admin.productForVendors.create', compact('categories', 'sub_categories', 'tags'));
    }

    public function store(StoreProductForVendorRequest $request)
    {
        $productForVendor = ProductForVendor::create($request->all());
        $productForVendor->tags()->sync($request->input('tags', []));

        foreach ($request->input('imagaes', []) as $file) {
            $productForVendor->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('imagaes');
        }

        foreach ($request->input('videos', []) as $file) {
            $productForVendor->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('videos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $productForVendor->id]);
        }

        return redirect()->route('admin.product-for-vendors.index');
    }

    public function edit(ProductForVendor $productForVendor)
    {
        abort_if(Gate::denies('product_for_vendor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = CategoriesForAdmin::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sub_categories = SubCategoryForAdmin::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tags = ArticleTag::all()->pluck('name', 'id');

        $productForVendor->load('category', 'sub_category', 'tags', 'approved_by', 'created_by');

        return view('admin.productForVendors.edit', compact('categories', 'sub_categories', 'tags', 'productForVendor'));
    }

    public function update(UpdateProductForVendorRequest $request, ProductForVendor $productForVendor)
    {
        $productForVendor->update($request->all());
        $productForVendor->tags()->sync($request->input('tags', []));

        if (count($productForVendor->imagaes) > 0) {
            foreach ($productForVendor->imagaes as $media) {
                if (!in_array($media->file_name, $request->input('imagaes', []))) {
                    $media->delete();
                }
            }
        }

        $media = $productForVendor->imagaes->pluck('file_name')->toArray();

        foreach ($request->input('imagaes', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $productForVendor->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('imagaes');
            }
        }

        if (count($productForVendor->videos) > 0) {
            foreach ($productForVendor->videos as $media) {
                if (!in_array($media->file_name, $request->input('videos', []))) {
                    $media->delete();
                }
            }
        }

        $media = $productForVendor->videos->pluck('file_name')->toArray();

        foreach ($request->input('videos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $productForVendor->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('videos');
            }
        }

        return redirect()->route('admin.product-for-vendors.index');
    }

    public function show(ProductForVendor $productForVendor)
    {
        abort_if(Gate::denies('product_for_vendor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productForVendor->load('category', 'sub_category', 'tags', 'approved_by', 'created_by');


        return view('admin.productForVendors.show', compact('productForVendor'));
    }

    public function destroy(ProductForVendor $productForVendor)
    {
        abort_if(Gate::denies('product_for_vendor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productForVendor->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductForVendorRequest $request)
    {
        ProductForVendor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('product_for_vendor_create') && Gate::denies('product_for_vendor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ProductForVendor();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
