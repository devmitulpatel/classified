<?php

namespace App\Http\Requests;

use App\Models\PaymentGatewayForAdmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPaymentGatewayForAdminRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('payment_gateway_for_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:payment_gateway_for_admins,id',
        ];
    }
}
