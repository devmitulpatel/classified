<?php

namespace App\Http\Requests;

use App\Models\HighlightedCitiesForAdmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHighlightedCitiesForAdminRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('highlighted_cities_for_admin_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:highlighted_cities_for_admins,name,' . request()->route('highlighted_cities_for_admin')->id,
            ],
        ];
    }
}
