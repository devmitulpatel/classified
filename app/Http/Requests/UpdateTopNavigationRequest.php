<?php

namespace App\Http\Requests;

use App\Models\TopNavigation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTopNavigationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('top_navigation_edit');
    }

    public function rules()
    {
        return [
            'name'      => [
                'string',
                'required',
                'unique:top_navigations,name,' . request()->route('top_navigation')->id,
            ],
            'parent_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
