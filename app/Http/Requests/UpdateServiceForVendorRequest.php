<?php

namespace App\Http\Requests;

use App\Models\ServiceForVendor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateServiceForVendorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_for_vendor_edit');
    }

    public function rules()
    {
        return [
            'name'     => [
                'string',
                'required',
                'unique:service_for_vendors,name,' . request()->route('service_for_vendor')->id,
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
