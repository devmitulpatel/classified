<?php

namespace App\Http\Requests;

use App\Models\TopNavigation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTopNavigationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('top_navigation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:top_navigations,id',
        ];
    }
}
