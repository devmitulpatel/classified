<?php

namespace App\Http\Requests;

use App\Models\HighlightedSubCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHighlightedSubCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('highlighted_sub_category_create');
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
            'category_id'      => [
                'required',
                'integer',
            ],
        ];
    }
}
