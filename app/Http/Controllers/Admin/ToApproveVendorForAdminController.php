<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ToApproveVendorForAdminController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('to_approve_vendor_for_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.toApproveVendorForAdmins.index');
    }
}
