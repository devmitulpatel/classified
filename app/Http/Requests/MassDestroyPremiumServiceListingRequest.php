<?php

namespace App\Http\Requests;

use App\Models\PremiumServiceListing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPremiumServiceListingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('premium_service_listing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:premium_service_listings,id',
        ];
    }
}
