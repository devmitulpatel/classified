<?php

namespace App\Http\Requests;

use App\Models\WebsiteSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateWebsiteSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('website_setting_edit');
    }

    public function rules()
    {
        return [
            'name'         => [
                'string',
                'required',
                'unique:website_settings,name,' . request()->route('website_setting')->id,
            ],
            'value'        => [
                'required',
            ],
            'display_type' => [
                'required',
            ],
            'store_type'   => [
                'required',
            ],
        ];
    }
}
