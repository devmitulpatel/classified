<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateEmailSettingsForAdminRequest;
use App\Http\Resources\Admin\EmailSettingsForAdminResource;
use App\Models\EmailSettingsForAdmin;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmailSettingsForAdminApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('email_settings_for_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmailSettingsForAdminResource(EmailSettingsForAdmin::all());
    }

    public function show(EmailSettingsForAdmin $emailSettingsForAdmin)
    {
        abort_if(Gate::denies('email_settings_for_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmailSettingsForAdminResource($emailSettingsForAdmin);
    }

    public function update(UpdateEmailSettingsForAdminRequest $request, EmailSettingsForAdmin $emailSettingsForAdmin)
    {
        $emailSettingsForAdmin->update($request->all());

        return (new EmailSettingsForAdminResource($emailSettingsForAdmin))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }
}
