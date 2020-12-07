<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopNavigationRequest;
use App\Http\Requests\UpdateTopNavigationRequest;
use App\Http\Resources\Admin\TopNavigationResource;
use App\Models\TopNavigation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TopNavigationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('top_navigation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TopNavigationResource(TopNavigation::with(['parent'])->get());
    }

    public function store(StoreTopNavigationRequest $request)
    {
        $topNavigation = TopNavigation::create($request->all());

        return (new TopNavigationResource($topNavigation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TopNavigation $topNavigation)
    {
        abort_if(Gate::denies('top_navigation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TopNavigationResource($topNavigation->load(['parent']));
    }

    public function update(UpdateTopNavigationRequest $request, TopNavigation $topNavigation)
    {
        $topNavigation->update($request->all());

        return (new TopNavigationResource($topNavigation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TopNavigation $topNavigation)
    {
        abort_if(Gate::denies('top_navigation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $topNavigation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
