<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySubCategoryForAdminRequest;
use App\Http\Requests\StoreSubCategoryForAdminRequest;
use App\Http\Requests\UpdateSubCategoryForAdminRequest;
use App\Models\CategoriesForAdmin;
use App\Models\SubCategoryForAdmin;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SubCategoryForAdminController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('sub_category_for_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCategoryForAdmins = SubCategoryForAdmin::with(['parent_category', 'created_by', 'media'])->get();

        return view('admin.subCategoryForAdmins.index', compact('subCategoryForAdmins'));
    }

    public function create()
    {
        abort_if(Gate::denies('sub_category_for_admin_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parent_categories = CategoriesForAdmin::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.subCategoryForAdmins.create', compact('parent_categories'));
    }

    public function store(StoreSubCategoryForAdminRequest $request)
    {
        $subCategoryForAdmin = SubCategoryForAdmin::create($request->all());

        if ($request->input('sub_category_image', false)) {
            $subCategoryForAdmin->addMedia(storage_path('tmp/uploads/' . $request->input('sub_category_image')))->toMediaCollection('sub_category_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $subCategoryForAdmin->id]);
        }

        return redirect()->route('admin.sub-category-for-admins.index');
    }

    public function edit(SubCategoryForAdmin $subCategoryForAdmin)
    {
        abort_if(Gate::denies('sub_category_for_admin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parent_categories = CategoriesForAdmin::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subCategoryForAdmin->load('parent_category', 'created_by');

        return view('admin.subCategoryForAdmins.edit', compact('parent_categories', 'subCategoryForAdmin'));
    }

    public function update(UpdateSubCategoryForAdminRequest $request, SubCategoryForAdmin $subCategoryForAdmin)
    {
        $subCategoryForAdmin->update($request->all());

        if ($request->input('sub_category_image', false)) {
            if (!$subCategoryForAdmin->sub_category_image || $request->input('sub_category_image') !== $subCategoryForAdmin->sub_category_image->file_name) {
                if ($subCategoryForAdmin->sub_category_image) {
                    $subCategoryForAdmin->sub_category_image->delete();
                }

                $subCategoryForAdmin->addMedia(storage_path('tmp/uploads/' . $request->input('sub_category_image')))->toMediaCollection('sub_category_image');
            }
        } elseif ($subCategoryForAdmin->sub_category_image) {
            $subCategoryForAdmin->sub_category_image->delete();
        }

        return redirect()->route('admin.sub-category-for-admins.index');
    }

    public function show(SubCategoryForAdmin $subCategoryForAdmin)
    {
        abort_if(Gate::denies('sub_category_for_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCategoryForAdmin->load('parent_category', 'created_by');

        return view('admin.subCategoryForAdmins.show', compact('subCategoryForAdmin'));
    }

    public function destroy(SubCategoryForAdmin $subCategoryForAdmin)
    {
        abort_if(Gate::denies('sub_category_for_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCategoryForAdmin->delete();

        return back();
    }

    public function massDestroy(MassDestroySubCategoryForAdminRequest $request)
    {
        SubCategoryForAdmin::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('sub_category_for_admin_create') && Gate::denies('sub_category_for_admin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SubCategoryForAdmin();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
