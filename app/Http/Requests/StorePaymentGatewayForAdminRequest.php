<?php

namespace App\Http\Requests;

use App\Models\PaymentGatewayForAdmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePaymentGatewayForAdminRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_gateway_for_admin_create');
    }

    public function rules()
    {
        return [
            'name'         => [
                'string',
                'required',
                'unique:payment_gateway_for_admins',
            ],
            'value'        => [
                'required',
            ],
            'display_type' => [
                'required',
            ],
            'store_type'   => [
                'required',
            ],
        ];
    }
}
