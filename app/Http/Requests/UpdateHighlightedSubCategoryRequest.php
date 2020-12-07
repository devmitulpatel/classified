<?php

namespace App\Http\Requests;

use App\Models\HighlightedSubCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHighlightedSubCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('highlighted_sub_category_edit');
    }

    public function rules()
    {
        return [
            'sub_categories.*' => [
                'integer',
            ],
            'sub_categories'   => [
                'required',
                'array',
            ],
        ];
    }
}
