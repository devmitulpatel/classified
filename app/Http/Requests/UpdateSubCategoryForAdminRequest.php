<?php

namespace App\Http\Requests;

use App\Models\SubCategoryForAdmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSubCategoryForAdminRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sub_category_for_admin_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:sub_category_for_admins,name,' . request()->route('sub_category_for_admin')->id,
            ],
        ];
    }
}
