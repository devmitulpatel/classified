<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyQueryFromWebsiteForAdminRequest;
use App\Http\Requests\StoreQueryFromWebsiteForAdminRequest;
use App\Http\Requests\UpdateQueryFromWebsiteForAdminRequest;
use App\Models\ProductForVendor;
use App\Models\QueryFromWebsiteForAdmin;
use App\Models\ServiceForVendor;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class QueryFromWebsiteForAdminController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('query_from_website_for_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $queryFromWebsiteForAdmins = QueryFromWebsiteForAdmin::with(['ref_products', 'ref_services'])->get();

        return view('admin.queryFromWebsiteForAdmins.index', compact('queryFromWebsiteForAdmins'));
    }

    public function create()
    {
        abort_if(Gate::denies('query_from_website_for_admin_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ref_products = ProductForVendor::all()->pluck('name', 'id');

        $ref_services = ServiceForVendor::all()->pluck('name', 'id');

        return view('admin.queryFromWebsiteForAdmins.create', compact('ref_products', 'ref_services'));
    }

    public function store(StoreQueryFromWebsiteForAdminRequest $request)
    {
        $queryFromWebsiteForAdmin = QueryFromWebsiteForAdmin::create($request->all());
        $queryFromWebsiteForAdmin->ref_products()->sync($request->input('ref_products', []));
        $queryFromWebsiteForAdmin->ref_services()->sync($request->input('ref_services', []));

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $queryFromWebsiteForAdmin->id]);
        }

        return redirect()->route('admin.query-from-website-for-admins.index');
    }

    public function edit(QueryFromWebsiteForAdmin $queryFromWebsiteForAdmin)
    {
        abort_if(Gate::denies('query_from_website_for_admin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ref_products = ProductForVendor::all()->pluck('name', 'id');

        $ref_services = ServiceForVendor::all()->pluck('name', 'id');

        $queryFromWebsiteForAdmin->load('ref_products', 'ref_services');

        return view('admin.queryFromWebsiteForAdmins.edit', compact('ref_products', 'ref_services', 'queryFromWebsiteForAdmin'));
    }

    public function update(UpdateQueryFromWebsiteForAdminRequest $request, QueryFromWebsiteForAdmin $queryFromWebsiteForAdmin)
    {
        $queryFromWebsiteForAdmin->update($request->all());
        $queryFromWebsiteForAdmin->ref_products()->sync($request->input('ref_products', []));
        $queryFromWebsiteForAdmin->ref_services()->sync($request->input('ref_services', []));

        return redirect()->route('admin.query-from-website-for-admins.index');
    }

    public function show(QueryFromWebsiteForAdmin $queryFromWebsiteForAdmin)
    {
        abort_if(Gate::denies('query_from_website_for_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $queryFromWebsiteForAdmin->load('ref_products', 'ref_services');

        return view('admin.queryFromWebsiteForAdmins.show', compact('queryFromWebsiteForAdmin'));
    }

    public function destroy(QueryFromWebsiteForAdmin $queryFromWebsiteForAdmin)
    {
        abort_if(Gate::denies('query_from_website_for_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $queryFromWebsiteForAdmin->delete();

        return back();
    }

    public function massDestroy(MassDestroyQueryFromWebsiteForAdminRequest $request)
    {
        QueryFromWebsiteForAdmin::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('query_from_website_for_admin_create') && Gate::denies('query_from_website_for_admin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new QueryFromWebsiteForAdmin();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
