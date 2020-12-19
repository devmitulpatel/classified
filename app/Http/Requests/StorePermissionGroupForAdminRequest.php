<?php

namespace App\Http\Requests;

use App\Models\PermissionGroupForAdmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePermissionGroupForAdminRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('permission_group_for_admin_create');
    }

    public function rules()
    {
        return [
            'name'          => [
                'string',
                'required',
                'unique:permission_group_for_admins',
            ],
            'permissions.*' => [
                'integer',
            ],
            'permissions'   => [
                'array',
            ],
        ];
    }
}
