<?php

namespace App\Http\Requests;

use App\Models\EmailSettingsForAdmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEmailSettingsForAdminRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('email_settings_for_admin_edit');
    }

    public function rules()
    {
        return [
            'name'         => [
                'string',
                'required',
                'unique:email_settings_for_admins,name,' . request()->route('email_settings_for_admin')->id,
            ],
            'value'        => [
                'required',
            ],
            'display_type' => [
                'required',
            ],
            'store_type'   => [
                'required',
            ],
        ];
    }
}
