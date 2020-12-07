<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHighlightedCategoryRequest;
use App\Http\Requests\UpdateHighlightedCategoryRequest;
use App\Http\Resources\Admin\HighlightedCategoryResource;
use App\Models\HighlightedCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HighlightedCategoriesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('highlighted_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HighlightedCategoryResource(HighlightedCategory::with(['categories'])->get());
    }

    public function store(StoreHighlightedCategoryRequest $request)
    {
        $highlightedCategory = HighlightedCategory::create($request->all());
        $highlightedCategory->categories()->sync($request->input('categories', []));

        return (new HighlightedCategoryResource($highlightedCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(HighlightedCategory $highlightedCategory)
    {
        abort_if(Gate::denies('highlighted_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HighlightedCategoryResource($highlightedCategory->load(['categories']));
    }

    public function update(UpdateHighlightedCategoryRequest $request, HighlightedCategory $highlightedCategory)
    {
        $highlightedCategory->update($request->all());
        $highlightedCategory->categories()->sync($request->input('categories', []));

        return (new HighlightedCategoryResource($highlightedCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(HighlightedCategory $highlightedCategory)
    {
        abort_if(Gate::denies('highlighted_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $highlightedCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
