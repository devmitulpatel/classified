<?php

namespace App\Http\Requests;

use App\Models\Article;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreArticleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('article_create');
    }

    public function rules()
    {
        return [
            'title'      => [
                'string',
                'required',
                'unique:articles',
            ],
            'title_long' => [
                'string',
                'nullable',
            ],
            'content'    => [
                'required',
            ],
            'tags.*'     => [
                'integer',
            ],
            'tags'       => [
                'array',
            ],
        ];
    }
}
