<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHighlightedSubCategoryRequest;
use App\Http\Requests\StoreHighlightedSubCategoryRequest;
use App\Http\Requests\UpdateHighlightedSubCategoryRequest;
use App\Models\CategoriesForAdmin;
use App\Models\HighlightedSubCategory;
use App\Models\SubCategoryForAdmin;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HighlightedSubCategoriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('highlighted_sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $highlightedSubCategories = HighlightedSubCategory::with(['sub_categories', 'category'])->get();

        return view('admin.highlightedSubCategories.index', compact('highlightedSubCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('highlighted_sub_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sub_categories = SubCategoryForAdmin::all()->pluck('name', 'id');

        $categories = CategoriesForAdmin::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.highlightedSubCategories.create', compact('sub_categories', 'categories'));
    }

    public function store(StoreHighlightedSubCategoryRequest $request)
    {
        $highlightedSubCategory = HighlightedSubCategory::create($request->all());
        $highlightedSubCategory->sub_categories()->sync($request->input('sub_categories', []));

        return redirect()->route('admin.highlighted-sub-categories.index');
    }

    public function edit(HighlightedSubCategory $highlightedSubCategory)
    {
        abort_if(Gate::denies('highlighted_sub_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sub_categories = SubCategoryForAdmin::all()->pluck('name', 'id');

        $categories = CategoriesForAdmin::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $highlightedSubCategory->load('sub_categories', 'category');

        return view('admin.highlightedSubCategories.edit', compact('sub_categories', 'categories', 'highlightedSubCategory'));
    }

    public function update(UpdateHighlightedSubCategoryRequest $request, HighlightedSubCategory $highlightedSubCategory)
    {
        $highlightedSubCategory->update($request->all());
        $highlightedSubCategory->sub_categories()->sync($request->input('sub_categories', []));

        return redirect()->route('admin.highlighted-sub-categories.index');
    }

    public function show(HighlightedSubCategory $highlightedSubCategory)
    {
        abort_if(Gate::denies('highlighted_sub_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $highlightedSubCategory->load('sub_categories', 'category');

        return view('admin.highlightedSubCategories.show', compact('highlightedSubCategory'));
    }

    public function destroy(HighlightedSubCategory $highlightedSubCategory)
    {
        abort_if(Gate::denies('highlighted_sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $highlightedSubCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyHighlightedSubCategoryRequest $request)
    {
        HighlightedSubCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
