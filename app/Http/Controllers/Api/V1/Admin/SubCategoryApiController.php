<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Http\Resources\Admin\SubCategoryResource;
use App\Models\SubCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubCategoryApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubCategoryResource(SubCategory::with(['parent_category', 'created_by'])->get());
    }

    public function store(StoreSubCategoryRequest $request)
    {
        $subCategory = SubCategory::create($request->all());

        if ($request->input('sub_category_image', false)) {
            $subCategory->addMedia(storage_path('tmp/uploads/' . $request->input('sub_category_image')))->toMediaCollection('sub_category_image');
        }

        return (new SubCategoryResource($subCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SubCategory $subCategory)
    {
        abort_if(Gate::denies('sub_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubCategoryResource($subCategory->load(['parent_category', 'created_by']));
    }

    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
    {
        $subCategory->update($request->all());

        if ($request->input('sub_category_image', false)) {
            if (!$subCategory->sub_category_image || $request->input('sub_category_image') !== $subCategory->sub_category_image->file_name) {
                if ($subCategory->sub_category_image) {
                    $subCategory->sub_category_image->delete();
                }

                $subCategory->addMedia(storage_path('tmp/uploads/' . $request->input('sub_category_image')))->toMediaCollection('sub_category_image');
            }
        } elseif ($subCategory->sub_category_image) {
            $subCategory->sub_category_image->delete();
        }

        return (new SubCategoryResource($subCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SubCategory $subCategory)
    {
        abort_if(Gate::denies('sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
