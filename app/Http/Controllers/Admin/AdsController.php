<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAdRequest;
use App\Http\Requests\StoreAdRequest;
use App\Http\Requests\UpdateAdRequest;
use App\Models\Ad;
use App\Models\CategoriesForAdmin;
use App\Models\ProductForVendor;
use App\Models\ServiceForVendor;
use App\Models\SubCategoryForAdmin;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ad_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ads = Ad::with(['categories', 'sub_categories', 'products', 'services'])->get();

        return view('admin.ads.index', compact('ads'));
    }

    public function create()
    {
        abort_if(Gate::denies('ad_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = CategoriesForAdmin::all()->pluck('name', 'id');

        $sub_categories = SubCategoryForAdmin::all()->pluck('name', 'id');

        $products = ProductForVendor::all()->pluck('name', 'id');

        $services = ServiceForVendor::all()->pluck('name', 'id');

        return view('admin.ads.create', compact('categories', 'sub_categories', 'products', 'services'));
    }

    public function store(StoreAdRequest $request)
    {
        $ad = Ad::create($request->all());
        $ad->categories()->sync($request->input('categories', []));
        $ad->sub_categories()->sync($request->input('sub_categories', []));
        $ad->products()->sync($request->input('products', []));
        $ad->services()->sync($request->input('services', []));

        return redirect()->route('admin.ads.index');
    }

    public function edit(Ad $ad)
    {
        abort_if(Gate::denies('ad_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = CategoriesForAdmin::all()->pluck('name', 'id');

        $sub_categories = SubCategoryForAdmin::all()->pluck('name', 'id');

        $products = ProductForVendor::all()->pluck('name', 'id');

        $services = ServiceForVendor::all()->pluck('name', 'id');

        $ad->load('categories', 'sub_categories', 'products', 'services');

        return view('admin.ads.edit', compact('categories', 'sub_categories', 'products', 'services', 'ad'));
    }

    public function update(UpdateAdRequest $request, Ad $ad)
    {
        $ad->update($request->all());
        $ad->categories()->sync($request->input('categories', []));
        $ad->sub_categories()->sync($request->input('sub_categories', []));
        $ad->products()->sync($request->input('products', []));
        $ad->services()->sync($request->input('services', []));

        return redirect()->route('admin.ads.index');
    }

    public function show(Ad $ad)
    {
        abort_if(Gate::denies('ad_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ad->load('categories', 'sub_categories', 'products', 'services');

        return view('admin.ads.show', compact('ad'));
    }

    public function destroy(Ad $ad)
    {
        abort_if(Gate::denies('ad_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ad->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdRequest $request)
    {
        Ad::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
