<?php

namespace App\Http\Requests;

use App\Models\Role;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRoleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('role_create');
    }

    public function rules()
    {
        return [
            'title'               => [
                'string',
                'required',
            ],
            'permissions.*'       => [
                'integer',
            ],
            'permissions'         => [
                'required',
                'array',
            ],
            'permission_groups.*' => [
                'integer',
            ],
            'permission_groups'   => [
                'array',
            ],
        ];
    }
}
