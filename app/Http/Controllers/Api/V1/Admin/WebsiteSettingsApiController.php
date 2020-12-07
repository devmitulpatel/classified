<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWebsiteSettingRequest;
use App\Http\Requests\UpdateWebsiteSettingRequest;
use App\Http\Resources\Admin\WebsiteSettingResource;
use App\Models\WebsiteSetting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebsiteSettingsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('website_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WebsiteSettingResource(WebsiteSetting::all());
    }

    public function store(StoreWebsiteSettingRequest $request)
    {
        $websiteSetting = WebsiteSetting::create($request->all());

        return (new WebsiteSettingResource($websiteSetting))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(WebsiteSetting $websiteSetting)
    {
        abort_if(Gate::denies('website_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WebsiteSettingResource($websiteSetting);
    }

    public function update(UpdateWebsiteSettingRequest $request, WebsiteSetting $websiteSetting)
    {
        $websiteSetting->update($request->all());

        return (new WebsiteSettingResource($websiteSetting))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(WebsiteSetting $websiteSetting)
    {
        abort_if(Gate::denies('website_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $websiteSetting->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
