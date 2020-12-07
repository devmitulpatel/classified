<?php

namespace App\Http\Requests;

use App\Models\HighlightedCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHighlightedCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('highlighted_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:highlighted_categories,id',
        ];
    }
}
