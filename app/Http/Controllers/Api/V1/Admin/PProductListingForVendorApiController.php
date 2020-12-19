<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePProductListingForVendorRequest;
use App\Http\Requests\UpdatePProductListingForVendorRequest;
use App\Http\Resources\Admin\PProductListingForVendorResource;
use App\Models\PProductListingForVendor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PProductListingForVendorApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('p_product_listing_for_vendor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PProductListingForVendorResource(PProductListingForVendor::with(['product', 'plan', 'created_by'])->get());
    }

    public function store(StorePProductListingForVendorRequest $request)
    {
        $pProductListingForVendor = PProductListingForVendor::create($request->all());

        return (new PProductListingForVendorResource($pProductListingForVendor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PProductListingForVendor $pProductListingForVendor)
    {
        abort_if(Gate::denies('p_product_listing_for_vendor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PProductListingForVendorResource($pProductListingForVendor->load(['product', 'plan', 'created_by']));
    }

    public function update(UpdatePProductListingForVendorRequest $request, PProductListingForVendor $pProductListingForVendor)
    {
        $pProductListingForVendor->update($request->all());

        return (new PProductListingForVendorResource($pProductListingForVendor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PProductListingForVendor $pProductListingForVendor)
    {
        abort_if(Gate::denies('p_product_listing_for_vendor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pProductListingForVendor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
