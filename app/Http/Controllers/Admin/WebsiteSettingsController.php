<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWebsiteSettingRequest;
use App\Http\Requests\StoreWebsiteSettingRequest;
use App\Http\Requests\UpdateWebsiteSettingRequest;
use App\Models\WebsiteSetting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebsiteSettingsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('website_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $websiteSettings = WebsiteSetting::all();

        return view('admin.websiteSettings.index', compact('websiteSettings'));
    }

    public function create()
    {
        abort_if(Gate::denies('website_setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.websiteSettings.create');
    }

    public function store(StoreWebsiteSettingRequest $request)
    {
        $websiteSetting = WebsiteSetting::create($request->all());

        return redirect()->route('admin.website-settings.index');
    }

    public function edit(WebsiteSetting $websiteSetting)
    {
        abort_if(Gate::denies('website_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.websiteSettings.edit', compact('websiteSetting'));
    }

    public function update(UpdateWebsiteSettingRequest $request, WebsiteSetting $websiteSetting)
    {
        $websiteSetting->update($request->all());

        return redirect()->route('admin.website-settings.index');
    }

    public function show(WebsiteSetting $websiteSetting)
    {
        abort_if(Gate::denies('website_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.websiteSettings.show', compact('websiteSetting'));
    }

    public function destroy(WebsiteSetting $websiteSetting)
    {
        abort_if(Gate::denies('website_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $websiteSetting->delete();

        return back();
    }

    public function massDestroy(MassDestroyWebsiteSettingRequest $request)
    {
        WebsiteSetting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
