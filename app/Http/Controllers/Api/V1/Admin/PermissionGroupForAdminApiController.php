<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionGroupForAdminRequest;
use App\Http\Requests\UpdatePermissionGroupForAdminRequest;
use App\Http\Resources\Admin\PermissionGroupForAdminResource;
use App\Models\PermissionGroupForAdmin;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionGroupForAdminApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('permission_group_for_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PermissionGroupForAdminResource(PermissionGroupForAdmin::with(['permissions'])->get());
    }

    public function store(StorePermissionGroupForAdminRequest $request)
    {
        $permissionGroupForAdmin = PermissionGroupForAdmin::create($request->all());
        $permissionGroupForAdmin->permissions()->sync($request->input('permissions', []));

        return (new PermissionGroupForAdminResource($permissionGroupForAdmin))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PermissionGroupForAdmin $permissionGroupForAdmin)
    {
        abort_if(Gate::denies('permission_group_for_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PermissionGroupForAdminResource($permissionGroupForAdmin->load(['permissions']));
    }

    public function update(UpdatePermissionGroupForAdminRequest $request, PermissionGroupForAdmin $permissionGroupForAdmin)
    {
        $permissionGroupForAdmin->update($request->all());
        $permissionGroupForAdmin->permissions()->sync($request->input('permissions', []));

        return (new PermissionGroupForAdminResource($permissionGroupForAdmin))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PermissionGroupForAdmin $permissionGroupForAdmin)
    {
        abort_if(Gate::denies('permission_group_for_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissionGroupForAdmin->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
