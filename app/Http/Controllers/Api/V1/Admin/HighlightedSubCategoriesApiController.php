<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHighlightedSubCategoryRequest;
use App\Http\Requests\UpdateHighlightedSubCategoryRequest;
use App\Http\Resources\Admin\HighlightedSubCategoryResource;
use App\Models\HighlightedSubCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HighlightedSubCategoriesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('highlighted_sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HighlightedSubCategoryResource(HighlightedSubCategory::with(['sub_categories', 'category'])->get());
    }

    public function store(StoreHighlightedSubCategoryRequest $request)
    {
        $highlightedSubCategory = HighlightedSubCategory::create($request->all());
        $highlightedSubCategory->sub_categories()->sync($request->input('sub_categories', []));

        return (new HighlightedSubCategoryResource($highlightedSubCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(HighlightedSubCategory $highlightedSubCategory)
    {
        abort_if(Gate::denies('highlighted_sub_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HighlightedSubCategoryResource($highlightedSubCategory->load(['sub_categories', 'category']));
    }

    public function update(UpdateHighlightedSubCategoryRequest $request, HighlightedSubCategory $highlightedSubCategory)
    {
        $highlightedSubCategory->update($request->all());
        $highlightedSubCategory->sub_categories()->sync($request->input('sub_categories', []));

        return (new HighlightedSubCategoryResource($highlightedSubCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(HighlightedSubCategory $highlightedSubCategory)
    {
        abort_if(Gate::denies('highlighted_sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $highlightedSubCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
