<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmailConfigurationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('email_configuration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.emailConfigurations.index');
    }
}
