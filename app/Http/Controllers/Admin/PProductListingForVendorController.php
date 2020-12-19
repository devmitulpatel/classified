<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPProductListingForVendorRequest;
use App\Http\Requests\StorePProductListingForVendorRequest;
use App\Http\Requests\UpdatePProductListingForVendorRequest;
use App\Models\Plan;
use App\Models\PProductListingForVendor;
use App\Models\ProductForVendor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PProductListingForVendorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('p_product_listing_for_vendor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pProductListingForVendors = PProductListingForVendor::with(['product', 'plan', 'created_by'])->get();

        return view('admin.pProductListingForVendors.index', compact('pProductListingForVendors'));
    }

    public function create()
    {
        abort_if(Gate::denies('p_product_listing_for_vendor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = ProductForVendor::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $plans = Plan::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pProductListingForVendors.create', compact('products', 'plans'));
    }

    public function store(StorePProductListingForVendorRequest $request)
    {
        $pProductListingForVendor = PProductListingForVendor::create($request->all());

        return redirect()->route('admin.p-product-listing-for-vendors.index');
    }

    public function edit(PProductListingForVendor $pProductListingForVendor)
    {
        abort_if(Gate::denies('p_product_listing_for_vendor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = ProductForVendor::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $plans = Plan::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pProductListingForVendor->load('product', 'plan', 'created_by');

        return view('admin.pProductListingForVendors.edit', compact('products', 'plans', 'pProductListingForVendor'));
    }

    public function update(UpdatePProductListingForVendorRequest $request, PProductListingForVendor $pProductListingForVendor)
    {
        $pProductListingForVendor->update($request->all());

        return redirect()->route('admin.p-product-listing-for-vendors.index');
    }

    public function show(PProductListingForVendor $pProductListingForVendor)
    {
        abort_if(Gate::denies('p_product_listing_for_vendor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pProductListingForVendor->load('product', 'plan', 'created_by');

        return view('admin.pProductListingForVendors.show', compact('pProductListingForVendor'));
    }

    public function destroy(PProductListingForVendor $pProductListingForVendor)
    {
        abort_if(Gate::denies('p_product_listing_for_vendor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pProductListingForVendor->delete();

        return back();
    }

    public function massDestroy(MassDestroyPProductListingForVendorRequest $request)
    {
        PProductListingForVendor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
