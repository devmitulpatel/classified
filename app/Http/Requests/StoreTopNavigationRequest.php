<?php

namespace App\Http\Requests;

use App\Models\TopNavigation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTopNavigationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('top_navigation_create');
    }

    public function rules()
    {
        return [
            'name'      => [
                'string',
                'required',
                'unique:top_navigations',
            ],
            'parent_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
