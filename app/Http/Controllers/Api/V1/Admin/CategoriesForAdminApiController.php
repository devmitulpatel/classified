<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCategoriesForAdminRequest;
use App\Http\Requests\UpdateCategoriesForAdminRequest;
use App\Http\Resources\Admin\CategoriesForAdminResource;
use App\Models\CategoriesForAdmin;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoriesForAdminApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('categories_for_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CategoriesForAdminResource(CategoriesForAdmin::with(['created_by'])->get());
    }

    public function store(StoreCategoriesForAdminRequest $request)
    {
        $categoriesForAdmin = CategoriesForAdmin::create($request->all());

        if ($request->input('img', false)) {
            $categoriesForAdmin->addMedia(storage_path('tmp/uploads/' . $request->input('img')))->toMediaCollection('img');
        }

        return (new CategoriesForAdminResource($categoriesForAdmin))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CategoriesForAdmin $categoriesForAdmin)
    {
        abort_if(Gate::denies('categories_for_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CategoriesForAdminResource($categoriesForAdmin->load(['created_by']));
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

        return (new CategoriesForAdminResource($categoriesForAdmin))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CategoriesForAdmin $categoriesForAdmin)
    {
        abort_if(Gate::denies('categories_for_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoriesForAdmin->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
