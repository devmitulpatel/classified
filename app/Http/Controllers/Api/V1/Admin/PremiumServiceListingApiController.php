<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePremiumServiceListingRequest;
use App\Http\Requests\UpdatePremiumServiceListingRequest;
use App\Http\Resources\Admin\PremiumServiceListingResource;
use App\Models\PremiumServiceListing;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PremiumServiceListingApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('premium_service_listing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PremiumServiceListingResource(PremiumServiceListing::with(['service', 'plan', 'created_by'])->get());
    }

    public function store(StorePremiumServiceListingRequest $request)
    {
        $premiumServiceListing = PremiumServiceListing::create($request->all());

        return (new PremiumServiceListingResource($premiumServiceListing))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PremiumServiceListing $premiumServiceListing)
    {
        abort_if(Gate::denies('premium_service_listing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PremiumServiceListingResource($premiumServiceListing->load(['service', 'plan', 'created_by']));
    }

    public function update(UpdatePremiumServiceListingRequest $request, PremiumServiceListing $premiumServiceListing)
    {
        $premiumServiceListing->update($request->all());

        return (new PremiumServiceListingResource($premiumServiceListing))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PremiumServiceListing $premiumServiceListing)
    {
        abort_if(Gate::denies('premium_service_listing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $premiumServiceListing->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
