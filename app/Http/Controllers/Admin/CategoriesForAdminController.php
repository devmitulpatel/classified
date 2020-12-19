<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCategoriesForAdminRequest;
use App\Http\Requests\StoreCategoriesForAdminRequest;
use App\Http\Requests\UpdateCategoriesForAdminRequest;
use App\Models\CategoriesForAdmin;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CategoriesForAdminController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('categories_for_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoriesForAdmins = CategoriesForAdmin::with(['created_by', 'media'])->get();

        return view('admin.categoriesForAdmins.index', compact('categoriesForAdmins'));
    }

    public function create()
    {
        abort_if(Gate::denies('categories_for_admin_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoriesForAdmins.create');
    }

    public function store(StoreCategoriesForAdminRequest $request)
    {
        $categoriesForAdmin = CategoriesForAdmin::create($request->all());

        if ($request->input('img', false)) {
            $categoriesForAdmin->addMedia(storage_path('tmp/uploads/' . $request->input('img')))->toMediaCollection('img');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $categoriesForAdmin->id]);
        }

        return redirect()->route('admin.categories-for-admins.index');
    }

    public function edit(CategoriesForAdmin $categoriesForAdmin)
    {
        abort_if(Gate::denies('categories_for_admin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoriesForAdmin->load('created_by');

        return view('admin.categoriesForAdmins.edit', compact('categoriesForAdmin'));
    }

    public function update(UpdateCategoriesForAdminRequest $request, CategoriesForAdmin $categoriesForAdmin)
    {
        $categoriesForAdmin->update($request->all());

        if ($request->input('img', false)) {
            if (!$categoriesForAdmin->img || $request->input('img') !== $categoriesForAdmin->img->file_name) {
                if ($categoriesForAdmin->img) {
                    $categoriesForAdmin->img->delete();
                }

                $categoriesForAdmin->addMedia(storage_path('tmp/uploads/' . $request->input('img')))->toMediaCollection('img');
            }
        } elseif ($categoriesForAdmin->img) {
            $categoriesForAdmin->img->delete();
        }

        return redirect()->route('admin.categories-for-admins.index');
    }

    public function show(CategoriesForAdmin $categoriesForAdmin)
    {
        abort_if(Gate::denies('categories_for_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoriesForAdmin->load('created_by');

        return view('admin.categoriesForAdmins.show', compact('categoriesForAdmin'));
    }

    public function destroy(CategoriesForAdmin $categoriesForAdmin)
    {
        abort_if(Gate::denies('categories_for_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoriesForAdmin->delete();

        return back();
    }

    public function massDestroy(MassDestroyCategoriesForAdminRequest $request)
    {
        CategoriesForAdmin::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('categories_for_admin_create') && Gate::denies('categories_for_admin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CategoriesForAdmin();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
