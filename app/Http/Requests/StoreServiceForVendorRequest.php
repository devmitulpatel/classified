<?php

namespace App\Http\Requests;

use App\Models\ServiceForVendor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreServiceForVendorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_for_vendor_create');
    }

    public function rules()
    {
        return [
            'name'     => [
                'string',
                'required',
                'unique:service_for_vendors',
            ],
            'tax_rate' => [
                'string',
                'nullable',
            ],
            'tags.*'   => [
                'integer',
            ],
            'tags'     => [
                'array',
            ],
        ];
    }
}
