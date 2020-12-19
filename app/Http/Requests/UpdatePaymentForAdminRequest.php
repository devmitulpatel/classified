<?php

namespace App\Http\Requests;

use App\Models\PaymentForAdmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePaymentForAdminRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_for_admin_edit');
    }

    public function rules()
    {
        return [
            'ref_products.*' => [
                'integer',
            ],
            'ref_products'   => [
                'array',
            ],
        ];
    }
}
