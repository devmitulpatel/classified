<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePServiceListingForVendorRequest;
use App\Http\Requests\UpdatePServiceListingForVendorRequest;
use App\Http\Resources\Admin\PServiceListingForVendorResource;
use App\Models\PServiceListingForVendor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PServiceListingForVendorApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('p_service_listing_for_vendor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PServiceListingForVendorResource(PServiceListingForVendor::with(['service', 'plan', 'created_by'])->get());
    }

    public function store(StorePServiceListingForVendorRequest $request)
    {
        $pServiceListingForVendor = PServiceListingForVendor::create($request->all());

        return (new PServiceListingForVendorResource($pServiceListingForVendor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PServiceListingForVendor $pServiceListingForVendor)
    {
        abort_if(Gate::denies('p_service_listing_for_vendor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PServiceListingForVendorResource($pServiceListingForVendor->load(['service', 'plan', 'created_by']));
    }

    public function update(UpdatePServiceListingForVendorRequest $request, PServiceListingForVendor $pServiceListingForVendor)
    {
        $pServiceListingForVendor->update($request->all());

        return (new PServiceListingForVendorResource($pServiceListingForVendor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PServiceListingForVendor $pServiceListingForVendor)
    {
        abort_if(Gate::denies('p_service_listing_for_vendor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pServiceListingForVendor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
