<?php

namespace App\Http\Requests;

use App\Models\FeedbackForAdmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFeedbackForAdminRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('feedback_for_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:feedback_for_admins,id',
        ];
    }
}
