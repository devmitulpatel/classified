<?php

namespace App\Http\Requests;

use App\Models\HighlightedCitiesForAdmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHighlightedCitiesForAdminRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('highlighted_cities_for_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:highlighted_cities_for_admins,id',
        ];
    }
}
