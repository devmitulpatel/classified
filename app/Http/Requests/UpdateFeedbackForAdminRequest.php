<?php

namespace App\Http\Requests;

use App\Models\FeedbackForAdmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFeedbackForAdminRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('feedback_for_admin_edit');
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
            'ref_services.*' => [
                'integer',
            ],
            'ref_services'   => [
                'array',
            ],
            'name'           => [
                'string',
                'required',
            ],
            'email'          => [
                'required',
            ],
            'company'        => [
                'string',
                'nullable',
            ],
            'content'        => [
                'required',
            ],
        ];
    }
}
