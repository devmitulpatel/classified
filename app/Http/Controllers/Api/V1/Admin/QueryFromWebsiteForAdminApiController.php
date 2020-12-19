<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreQueryFromWebsiteForAdminRequest;
use App\Http\Requests\UpdateQueryFromWebsiteForAdminRequest;
use App\Http\Resources\Admin\QueryFromWebsiteForAdminResource;
use App\Models\QueryFromWebsiteForAdmin;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QueryFromWebsiteForAdminApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('query_from_website_for_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QueryFromWebsiteForAdminResource(QueryFromWebsiteForAdmin::with(['ref_products', 'ref_services'])->get());
    }

    public function store(StoreQueryFromWebsiteForAdminRequest $request)
    {
        $queryFromWebsiteForAdmin = QueryFromWebsiteForAdmin::create($request->all());
        $queryFromWebsiteForAdmin->ref_products()->sync($request->input('ref_products', []));
        $queryFromWebsiteForAdmin->ref_services()->sync($request->input('ref_services', []));

        return (new QueryFromWebsiteForAdminResource($queryFromWebsiteForAdmin))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(QueryFromWebsiteForAdmin $queryFromWebsiteForAdmin)
    {
        abort_if(Gate::denies('query_from_website_for_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QueryFromWebsiteForAdminResource($queryFromWebsiteForAdmin->load(['ref_products', 'ref_services']));
    }

    public function update(UpdateQueryFromWebsiteForAdminRequest $request, QueryFromWebsiteForAdmin $queryFromWebsiteForAdmin)
    {
        $queryFromWebsiteForAdmin->update($request->all());
        $queryFromWebsiteForAdmin->ref_products()->sync($request->input('ref_products', []));
        $queryFromWebsiteForAdmin->ref_services()->sync($request->input('ref_services', []));

        return (new QueryFromWebsiteForAdminResource($queryFromWebsiteForAdmin))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(QueryFromWebsiteForAdmin $queryFromWebsiteForAdmin)
    {
        abort_if(Gate::denies('query_from_website_for_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $queryFromWebsiteForAdmin->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
