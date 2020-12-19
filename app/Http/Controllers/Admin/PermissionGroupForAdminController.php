<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionGroupForAdminRequest;
use App\Http\Requests\StorePermissionGroupForAdminRequest;
use App\Http\Requests\UpdatePermissionGroupForAdminRequest;
use App\Models\Permission;
use App\Models\PermissionGroupForAdmin;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionGroupForAdminController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('permission_group_for_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissionGroupForAdmins = PermissionGroupForAdmin::with(['permissions'])->get();

        return view('admin.permissionGroupForAdmins.index', compact('permissionGroupForAdmins'));
    }

    public function create()
    {
        abort_if(Gate::denies('permission_group_for_admin_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->pluck('title', 'id');

        return view('admin.permissionGroupForAdmins.create', compact('permissions'));
    }

    public function store(StorePermissionGroupForAdminRequest $request)
    {
        $permissionGroupForAdmin = PermissionGroupForAdmin::create($request->all());
        $permissionGroupForAdmin->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.permission-group-for-admins.index');
    }

    public function edit(PermissionGroupForAdmin $permissionGroupForAdmin)
    {
        abort_if(Gate::denies('permission_group_for_admin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->pluck('title', 'id');

        $permissionGroupForAdmin->load('permissions');

        return view('admin.permissionGroupForAdmins.edit', compact('permissions', 'permissionGroupForAdmin'));
    }

    public function update(UpdatePermissionGroupForAdminRequest $request, PermissionGroupForAdmin $permissionGroupForAdmin)
    {
        $permissionGroupForAdmin->update($request->all());
        $permissionGroupForAdmin->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.permission-group-for-admins.index');
    }

    public function show(PermissionGroupForAdmin $permissionGroupForAdmin)
    {
        abort_if(Gate::denies('permission_group_for_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissionGroupForAdmin->load('permissions');

        return view('admin.permissionGroupForAdmins.show', compact('permissionGroupForAdmin'));
    }

    public function destroy(PermissionGroupForAdmin $permissionGroupForAdmin)
    {
        abort_if(Gate::denies('permission_group_for_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissionGroupForAdmin->delete();

        return back();
    }

    public function massDestroy(MassDestroyPermissionGroupForAdminRequest $request)
    {
        PermissionGroupForAdmin::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
