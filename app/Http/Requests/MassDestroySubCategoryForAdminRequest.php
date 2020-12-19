<?php

namespace App\Http\Requests;

use App\Models\SubCategoryForAdmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySubCategoryForAdminRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sub_category_for_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sub_category_for_admins,id',
        ];
    }
}
