<?php

namespace App\Http\Requests;

use App\Models\PaymentForAdmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePaymentForAdminRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_for_admin_create');
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
