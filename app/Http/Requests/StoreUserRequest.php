<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_create');
    }

    public function rules()
    {
        return [
            'name'       => [
                'string',
                'required',
            ],
            'email'      => [
                'required',
                'unique:users',
            ],
            'password'   => [
                'required',
            ],
            'roles.*'    => [
                'integer',
            ],
            'roles'      => [
                'required',
                'array',
            ],
            'city'       => [
                'string',
                'nullable',
            ],
            'state'      => [
                'string',
                'nullable',
            ],
            'country'    => [
                'string',
                'nullable',
            ],
            'pincode'    => [
                'string',
                'nullable',
            ],
            'area'       => [
                'string',
                'nullable',
            ],
            'contact_no' => [
                'string',
                'nullable',
            ],
        ];
    }
}
