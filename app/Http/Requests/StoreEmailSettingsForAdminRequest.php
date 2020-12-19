<?php

namespace App\Http\Requests;

use App\Models\EmailSettingsForAdmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEmailSettingsForAdminRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('email_settings_for_admin_create');
    }

    public function rules()
    {
        return [
            'name'         => [
                'string',
                'required',
                'unique:email_settings_for_admins',
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
