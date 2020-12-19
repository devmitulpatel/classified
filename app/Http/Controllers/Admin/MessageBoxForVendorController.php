<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MessageBoxForVendorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('message_box_for_vendor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.messageBoxForVendors.index');
    }
}
