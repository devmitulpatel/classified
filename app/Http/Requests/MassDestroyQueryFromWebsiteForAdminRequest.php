<?php

namespace App\Http\Requests;

use App\Models\QueryFromWebsiteForAdmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyQueryFromWebsiteForAdminRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('query_from_website_for_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:query_from_website_for_admins,id',
        ];
    }
}
