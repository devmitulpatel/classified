<?php

namespace App\Http\Requests;

use App\Models\MessageBox;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMessageBoxRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('message_box_edit');
    }

    public function rules()
    {
        return [
            'users_id' => [
                'required',
                'integer',
            ],
            'from_id'  => [
                'required',
                'integer',
            ],
            'message'  => [
                'required',
            ],
        ];
    }
}
