<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPremiumServiceListingRequest;
use App\Http\Requests\StorePremiumServiceListingRequest;
use App\Http\Requests\UpdatePremiumServiceListingRequest;
use App\Models\Plan;
use App\Models\PremiumServiceListing;
use App\Models\Service;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PremiumServiceListingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('premium_service_listing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $premiumServiceListings = PremiumServiceListing::with(['service', 'plan', 'created_by'])->get();

        return view('admin.premiumServiceListings.index', compact('premiumServiceListings'));
    }

    public function create()
    {
        abort_if(Gate::denies('premium_service_listing_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $plans = Plan::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.premiumServiceListings.create', compact('services', 'plans'));
    }

    public function store(StorePremiumServiceListingRequest $request)
    {
        $premiumServiceListing = PremiumServiceListing::create($request->all());

        return redirect()->route('admin.premium-service-listings.index');
    }

    public function edit(PremiumServiceListing $premiumServiceListing)
    {
        abort_if(Gate::denies('premium_service_listing_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $plans = Plan::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $premiumServiceListing->load('service', 'plan', 'created_by');

        return view('admin.premiumServiceListings.edit', compact('services', 'plans', 'premiumServiceListing'));
    }

    public function update(UpdatePremiumServiceListingRequest $request, PremiumServiceListing $premiumServiceListing)
    {
        $premiumServiceListing->update($request->all());

        return redirect()->route('admin.premium-service-listings.index');
    }

    public function show(PremiumServiceListing $premiumServiceListing)
    {
        abort_if(Gate::denies('premium_service_listing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $premiumServiceListing->load('service', 'plan', 'created_by');

        return view('admin.premiumServiceListings.show', compact('premiumServiceListing'));
    }

    public function destroy(PremiumServiceListing $premiumServiceListing)
    {
        abort_if(Gate::denies('premium_service_listing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $premiumServiceListing->delete();

        return back();
    }

    public function massDestroy(MassDestroyPremiumServiceListingRequest $request)
    {
        PremiumServiceListing::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
