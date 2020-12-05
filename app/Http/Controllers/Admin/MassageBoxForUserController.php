<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MassageBoxForUserController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('massage_box_for_user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.massageBoxForUsers.index');
    }
}
