<?php

namespace App\Http\Requests;

use App\Models\ProductForVendor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProductForVendorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('product_for_vendor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:product_for_vendors,id',
        ];
    }
}
