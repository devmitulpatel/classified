<?php

namespace App\Http\Requests;

use App\Models\CategoriesForAdmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCategoriesForAdminRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('categories_for_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:categories_for_admins,id',
        ];
    }
}
