<?php

namespace App\Http\Requests;

use App\Models\ProductForVendor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductForVendorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_for_vendor_create');
    }

    public function rules()
    {
        return [
            'name'            => [
                'string',
                'required',
                'unique:product_for_vendors',
            ],
            'category_id'     => [
                'required',
                'integer',
            ],
            'sub_category_id' => [
                'required',
                'integer',
            ],
            'tax_rate'        => [
                'string',
                'nullable',
            ],
            'tags.*'          => [
                'integer',
            ],
            'tags'            => [
                'array',
            ],
        ];
    }
}
