<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdRequest;
use App\Http\Requests\UpdateAdRequest;
use App\Http\Resources\Admin\AdResource;
use App\Models\Ad;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ad_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AdResource(Ad::with(['categories', 'sub_categories', 'products', 'services'])->get());
    }

    public function store(StoreAdRequest $request)
    {
        $ad = Ad::create($request->all());
        $ad->categories()->sync($request->input('categories', []));
        $ad->sub_categories()->sync($request->input('sub_categories', []));
        $ad->products()->sync($request->input('products', []));
        $ad->services()->sync($request->input('services', []));

        return (new AdResource($ad))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Ad $ad)
    {
        abort_if(Gate::denies('ad_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AdResource($ad->load(['categories', 'sub_categories', 'products', 'services']));
    }

    public function update(UpdateAdRequest $request, Ad $ad)
    {
        $ad->update($request->all());
        $ad->categories()->sync($request->input('categories', []));
        $ad->sub_categories()->sync($request->input('sub_categories', []));
        $ad->products()->sync($request->input('products', []));
        $ad->services()->sync($request->input('services', []));

        return (new AdResource($ad))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Ad $ad)
    {
        abort_if(Gate::denies('ad_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ad->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
