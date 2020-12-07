<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHighlightedCategoryRequest;
use App\Http\Requests\StoreHighlightedCategoryRequest;
use App\Http\Requests\UpdateHighlightedCategoryRequest;
use App\Models\Category;
use App\Models\HighlightedCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HighlightedCategoriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('highlighted_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $highlightedCategories = HighlightedCategory::with(['categories'])->get();

        return view('admin.highlightedCategories.index', compact('highlightedCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('highlighted_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id');

        return view('admin.highlightedCategories.create', compact('categories'));
    }

    public function store(StoreHighlightedCategoryRequest $request)
    {
        $highlightedCategory = HighlightedCategory::create($request->all());
        $highlightedCategory->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.highlighted-categories.index');
    }

    public function edit(HighlightedCategory $highlightedCategory)
    {
        abort_if(Gate::denies('highlighted_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id');

        $highlightedCategory->load('categories');

        return view('admin.highlightedCategories.edit', compact('categories', 'highlightedCategory'));
    }

    public function update(UpdateHighlightedCategoryRequest $request, HighlightedCategory $highlightedCategory)
    {
        $highlightedCategory->update($request->all());
        $highlightedCategory->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.highlighted-categories.index');
    }

    public function show(HighlightedCategory $highlightedCategory)
    {
        abort_if(Gate::denies('highlighted_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $highlightedCategory->load('categories');

        return view('admin.highlightedCategories.show', compact('highlightedCategory'));
    }

    public function destroy(HighlightedCategory $highlightedCategory)
    {
        abort_if(Gate::denies('highlighted_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $highlightedCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyHighlightedCategoryRequest $request)
    {
        HighlightedCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
