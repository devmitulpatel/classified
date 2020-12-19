<?php

namespace App\Http\Requests;

use App\Models\QueryFromWebsiteForAdmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQueryFromWebsiteForAdminRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('query_from_website_for_admin_create');
    }

    public function rules()
    {
        return [
            'ref_products.*' => [
                'integer',
            ],
            'ref_products'   => [
                'array',
            ],
            'ref_services.*' => [
                'integer',
            ],
            'ref_services'   => [
                'array',
            ],
            'name'           => [
                'string',
                'required',
            ],
            'email'          => [
                'required',
            ],
            'company'        => [
                'string',
                'nullable',
            ],
            'content'        => [
                'required',
            ],
            'contact_no'     => [
                'string',
                'nullable',
            ],
        ];
    }
}
