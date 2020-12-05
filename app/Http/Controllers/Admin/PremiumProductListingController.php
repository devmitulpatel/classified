<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPremiumProductListingRequest;
use App\Http\Requests\StorePremiumProductListingRequest;
use App\Http\Requests\UpdatePremiumProductListingRequest;
use App\Models\Plan;
use App\Models\PremiumProductListing;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PremiumProductListingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('premium_product_listing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $premiumProductListings = PremiumProductListing::with(['product', 'plan', 'created_by'])->get();

        return view('admin.premiumProductListings.index', compact('premiumProductListings'));
    }

    public function create()
    {
        abort_if(Gate::denies('premium_product_listing_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $plans = Plan::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.premiumProductListings.create', compact('products', 'plans'));
    }

    public function store(StorePremiumProductListingRequest $request)
    {
        $premiumProductListing = PremiumProductListing::create($request->all());

        return redirect()->route('admin.premium-product-listings.index');
    }

    public function edit(PremiumProductListing $premiumProductListing)
    {
        abort_if(Gate::denies('premium_product_listing_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $plans = Plan::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $premiumProductListing->load('product', 'plan', 'created_by');

        return view('admin.premiumProductListings.edit', compact('products', 'plans', 'premiumProductListing'));
    }

    public function update(UpdatePremiumProductListingRequest $request, PremiumProductListing $premiumProductListing)
    {
        $premiumProductListing->update($request->all());

        return redirect()->route('admin.premium-product-listings.index');
    }

    public function show(PremiumProductListing $premiumProductListing)
    {
        abort_if(Gate::denies('premium_product_listing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $premiumProductListing->load('product', 'plan', 'created_by');

        return view('admin.premiumProductListings.show', compact('premiumProductListing'));
    }

    public function destroy(PremiumProductListing $premiumProductListing)
    {
        abort_if(Gate::denies('premium_product_listing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $premiumProductListing->delete();

        return back();
    }

    public function massDestroy(MassDestroyPremiumProductListingRequest $request)
    {
        PremiumProductListing::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
