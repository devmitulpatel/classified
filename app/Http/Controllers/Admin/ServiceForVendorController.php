<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyServiceForVendorRequest;
use App\Http\Requests\StoreServiceForVendorRequest;
use App\Http\Requests\UpdateServiceForVendorRequest;
use App\Models\ArticleTag;
use App\Models\CategoriesForAdmin;
use App\Models\ServiceForVendor;
use App\Models\SubCategoryForAdmin;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ServiceForVendorController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('service_for_vendor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceForVendors = ServiceForVendor::with(['category', 'sub_category', 'tags', 'approved_by', 'created_by', 'media'])->get();

        return view('admin.serviceForVendors.index', compact('serviceForVendors'));
    }

    public function create()
    {
        abort_if(Gate::denies('service_for_vendor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = CategoriesForAdmin::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sub_categories = SubCategoryForAdmin::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tags = ArticleTag::all()->pluck('name', 'id');

        return view('admin.serviceForVendors.create', compact('categories', 'sub_categories', 'tags'));
    }

    public function store(StoreServiceForVendorRequest $request)
    {
        $serviceForVendor = ServiceForVendor::create($request->all());
        $serviceForVendor->tags()->sync($request->input('tags', []));

        foreach ($request->input('images', []) as $file) {
            $serviceForVendor->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('images');
        }

        foreach ($request->input('videos', []) as $file) {
            $serviceForVendor->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('videos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $serviceForVendor->id]);
        }

        return redirect()->route('admin.service-for-vendors.index');
    }

    public function edit(ServiceForVendor $serviceForVendor)
    {
        abort_if(Gate::denies('service_for_vendor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = CategoriesForAdmin::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sub_categories = SubCategoryForAdmin::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tags = ArticleTag::all()->pluck('name', 'id');

        $serviceForVendor->load('category', 'sub_category', 'tags', 'approved_by', 'created_by');

        return view('admin.serviceForVendors.edit', compact('categories', 'sub_categories', 'tags', 'serviceForVendor'));
    }

    public function update(UpdateServiceForVendorRequest $request, ServiceForVendor $serviceForVendor)
    {
        $serviceForVendor->update($request->all());
        $serviceForVendor->tags()->sync($request->input('tags', []));

        if (count($serviceForVendor->images) > 0) {
            foreach ($serviceForVendor->images as $media) {
                if (!in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }

        $media = $serviceForVendor->images->pluck('file_name')->toArray();

        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $serviceForVendor->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('images');
            }
        }

        if (count($serviceForVendor->videos) > 0) {
            foreach ($serviceForVendor->videos as $media) {
                if (!in_array($media->file_name, $request->input('videos', []))) {
                    $media->delete();
                }
            }
        }

        $media = $serviceForVendor->videos->pluck('file_name')->toArray();

        foreach ($request->input('videos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $serviceForVendor->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('videos');
            }
        }

        return redirect()->route('admin.service-for-vendors.index');
    }

    public function show(ServiceForVendor $serviceForVendor)
    {
        abort_if(Gate::denies('service_for_vendor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceForVendor->load('category', 'sub_category', 'tags', 'approved_by', 'created_by');

        return view('admin.serviceForVendors.show', compact('serviceForVendor'));
    }

    public function destroy(ServiceForVendor $serviceForVendor)
    {
        abort_if(Gate::denies('service_for_vendor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceForVendor->delete();

        return back();
    }

    public function massDestroy(MassDestroyServiceForVendorRequest $request)
    {
        ServiceForVendor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('service_for_vendor_create') && Gate::denies('service_for_vendor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ServiceForVendor();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
