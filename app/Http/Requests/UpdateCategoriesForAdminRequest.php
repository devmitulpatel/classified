<?php

namespace App\Http\Requests;

use App\Models\CategoriesForAdmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCategoriesForAdminRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('categories_for_admin_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
