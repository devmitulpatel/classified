<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SToApproveForModeratorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('s_to_approve_for_moderator_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sToApproveForModerators.index');
    }
}
