<?php

namespace App\Http\Requests;

use App\Models\PProductListingForVendor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePProductListingForVendorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('p_product_listing_for_vendor_edit');
    }

    public function rules()
    {
        return [
            'expire_on'  => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'start_from' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'plan_id'    => [
                'required',
                'integer',
            ],
        ];
    }
}
