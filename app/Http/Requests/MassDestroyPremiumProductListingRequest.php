<?php

namespace App\Http\Requests;

use App\Models\PremiumProductListing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPremiumProductListingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('premium_product_listing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:premium_product_listings,id',
        ];
    }
}
