<?php

namespace App\Http\Requests;

use App\Models\HighlightedCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHighlightedCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('highlighted_category_create');
    }

    public function rules()
    {
        return [
            'categories.*' => [
                'integer',
            ],
            'categories'   => [
                'required',
                'array',
            ],
        ];
    }
}
