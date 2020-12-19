<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPServiceListingForVendorRequest;
use App\Http\Requests\StorePServiceListingForVendorRequest;
use App\Http\Requests\UpdatePServiceListingForVendorRequest;
use App\Models\Plan;
use App\Models\PServiceListingForVendor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PServiceListingForVendorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('p_service_listing_for_vendor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pServiceListingForVendors = PServiceListingForVendor::with(['service', 'plan', 'created_by'])->get();

        return view('admin.pServiceListingForVendors.index', compact('pServiceListingForVendors'));
    }

    public function create()
    {
        abort_if(Gate::denies('p_service_listing_for_vendor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = PServiceListingForVendor::all()->pluck('expire_on', 'id')->prepend(trans('global.pleaseSelect'), '');

        $plans = Plan::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pServiceListingForVendors.create', compact('services', 'plans'));
    }

    public function store(StorePServiceListingForVendorRequest $request)
    {
        $pServiceListingForVendor = PServiceListingForVendor::create($request->all());

        return redirect()->route('admin.p-service-listing-for-vendors.index');
    }

    public function edit(PServiceListingForVendor $pServiceListingForVendor)
    {
        abort_if(Gate::denies('p_service_listing_for_vendor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = PServiceListingForVendor::all()->pluck('expire_on', 'id')->prepend(trans('global.pleaseSelect'), '');

        $plans = Plan::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pServiceListingForVendor->load('service', 'plan', 'created_by');

        return view('admin.pServiceListingForVendors.edit', compact('services', 'plans', 'pServiceListingForVendor'));
    }

    public function update(UpdatePServiceListingForVendorRequest $request, PServiceListingForVendor $pServiceListingForVendor)
    {
        $pServiceListingForVendor->update($request->all());

        return redirect()->route('admin.p-service-listing-for-vendors.index');
    }

    public function show(PServiceListingForVendor $pServiceListingForVendor)
    {
        abort_if(Gate::denies('p_service_listing_for_vendor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pServiceListingForVendor->load('service', 'plan', 'created_by');

        return view('admin.pServiceListingForVendors.show', compact('pServiceListingForVendor'));
    }

    public function destroy(PServiceListingForVendor $pServiceListingForVendor)
    {
        abort_if(Gate::denies('p_service_listing_for_vendor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pServiceListingForVendor->delete();

        return back();
    }

    public function massDestroy(MassDestroyPServiceListingForVendorRequest $request)
    {
        PServiceListingForVendor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
