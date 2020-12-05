<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePremiumProductListingRequest;
use App\Http\Requests\UpdatePremiumProductListingRequest;
use App\Http\Resources\Admin\PremiumProductListingResource;
use App\Models\PremiumProductListing;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PremiumProductListingApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('premium_product_listing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PremiumProductListingResource(PremiumProductListing::with(['product', 'plan', 'created_by'])->get());
    }

    public function store(StorePremiumProductListingRequest $request)
    {
        $premiumProductListing = PremiumProductListing::create($request->all());

        return (new PremiumProductListingResource($premiumProductListing))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PremiumProductListing $premiumProductListing)
    {
        abort_if(Gate::denies('premium_product_listing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PremiumProductListingResource($premiumProductListing->load(['product', 'plan', 'created_by']));
    }

    public function update(UpdatePremiumProductListingRequest $request, PremiumProductListing $premiumProductListing)
    {
        $premiumProductListing->update($request->all());

        return (new PremiumProductListingResource($premiumProductListing))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PremiumProductListing $premiumProductListing)
    {
        abort_if(Gate::denies('premium_product_listing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $premiumProductListing->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
