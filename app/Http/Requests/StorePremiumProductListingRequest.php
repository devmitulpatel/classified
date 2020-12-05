<?php

namespace App\Http\Requests;

use App\Models\PremiumProductListing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePremiumProductListingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('premium_product_listing_create');
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
