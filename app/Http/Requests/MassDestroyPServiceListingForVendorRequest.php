<?php

namespace App\Http\Requests;

use App\Models\PServiceListingForVendor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPServiceListingForVendorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('p_service_listing_for_vendor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:p_service_listing_for_vendors,id',
        ];
    }
}
