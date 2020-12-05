<?php

namespace App\Http\Requests;

use App\Models\Plan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePlanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('plan_create');
    }

    public function rules()
    {
        return [
            'name'                   => [
                'string',
                'nullable',
            ],
            'monthly_cost'           => [
                'numeric',
            ],
            'half_yearly_cost'       => [
                'numeric',
            ],
            'yearly_cost'            => [
                'numeric',
            ],
            'two_year_bundle_cost'   => [
                'numeric',
            ],
            'three_year_bundle_cost' => [
                'numeric',
            ],
            'life_time_cost'         => [
                'numeric',
            ],
            'currency'               => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
