<?php

namespace App\Http\Requests;

use App\Models\HighlightedCitiesForAdmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHighlightedCitiesForAdminRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('highlighted_cities_for_admin_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:highlighted_cities_for_admins',
            ],
        ];
    }
}
