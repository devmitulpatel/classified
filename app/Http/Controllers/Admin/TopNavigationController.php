<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTopNavigationRequest;
use App\Http\Requests\StoreTopNavigationRequest;
use App\Http\Requests\UpdateTopNavigationRequest;
use App\Models\TopNavigation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TopNavigationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('top_navigation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $topNavigations = TopNavigation::with(['parent'])->get();

        return view('admin.topNavigations.index', compact('topNavigations'));
    }

    public function create()
    {
        abort_if(Gate::denies('top_navigation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parents = TopNavigation::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.topNavigations.create', compact('parents'));
    }

    public function store(StoreTopNavigationRequest $request)
    {
        $topNavigation = TopNavigation::create($request->all());

        return redirect()->route('admin.top-navigations.index');
    }

    public function edit(TopNavigation $topNavigation)
    {
        abort_if(Gate::denies('top_navigation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parents = TopNavigation::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $topNavigation->load('parent');

        return view('admin.topNavigations.edit', compact('parents', 'topNavigation'));
    }

    public function update(UpdateTopNavigationRequest $request, TopNavigation $topNavigation)
    {
        $topNavigation->update($request->all());

        return redirect()->route('admin.top-navigations.index');
    }

    public function show(TopNavigation $topNavigation)
    {
        abort_if(Gate::denies('top_navigation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $topNavigation->load('parent');

        return view('admin.topNavigations.show', compact('topNavigation'));
    }

    public function destroy(TopNavigation $topNavigation)
    {
        abort_if(Gate::denies('top_navigation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $topNavigation->delete();

        return back();
    }

    public function massDestroy(MassDestroyTopNavigationRequest $request)
    {
        TopNavigation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
