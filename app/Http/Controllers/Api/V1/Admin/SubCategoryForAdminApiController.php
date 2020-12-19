<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSubCategoryForAdminRequest;
use App\Http\Requests\UpdateSubCategoryForAdminRequest;
use App\Http\Resources\Admin\SubCategoryForAdminResource;
use App\Models\SubCategoryForAdmin;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubCategoryForAdminApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('sub_category_for_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubCategoryForAdminResource(SubCategoryForAdmin::with(['parent_category', 'created_by'])->get());
    }

    public function store(StoreSubCategoryForAdminRequest $request)
    {
        $subCategoryForAdmin = SubCategoryForAdmin::create($request->all());

        if ($request->input('sub_category_image', false)) {
            $subCategoryForAdmin->addMedia(storage_path('tmp/uploads/' . $request->input('sub_category_image')))->toMediaCollection('sub_category_image');
        }

        return (new SubCategoryForAdminResource($subCategoryForAdmin))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SubCategoryForAdmin $subCategoryForAdmin)
    {
        abort_if(Gate::denies('sub_category_for_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubCategoryForAdminResource($subCategoryForAdmin->load(['parent_category', 'created_by']));
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

        return (new SubCategoryForAdminResource($subCategoryForAdmin))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SubCategoryForAdmin $subCategoryForAdmin)
    {
        abort_if(Gate::denies('sub_category_for_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCategoryForAdmin->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
