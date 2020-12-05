<?php

namespace App\Http\Requests;

use App\Models\Ad;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAdRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ad_edit');
    }

    public function rules()
    {
        return [
            'name'             => [
                'string',
                'nullable',
            ],
            'categories.*'     => [
                'integer',
            ],
            'categories'       => [
                'array',
            ],
            'sub_categories.*' => [
                'integer',
            ],
            'sub_categories'   => [
                'array',
            ],
            'products.*'       => [
                'integer',
            ],
            'products'         => [
                'array',
            ],
            'services.*'       => [
                'integer',
            ],
            'services'         => [
                'array',
            ],
        ];
    }
}
