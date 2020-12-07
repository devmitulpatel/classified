<?php

namespace App\Http\Requests;

use App\Models\ClientReview;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClientReviewRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_review_edit');
    }

    public function rules()
    {
        return [
            'name'     => [
                'string',
                'required',
            ],
            'job_post' => [
                'string',
                'required',
            ],
            'company'  => [
                'string',
                'required',
            ],
            'comment'  => [
                'required',
            ],
        ];
    }
}
