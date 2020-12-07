<?php

namespace App\Http\Requests;

use App\Models\HighlightedSubCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHighlightedSubCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('highlighted_sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:highlighted_sub_categories,id',
        ];
    }
}
