<?php

namespace App\Http\Requests;

use App\Models\MessageBox;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMessageBoxRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('message_box_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:message_boxes,id',
        ];
    }
}
