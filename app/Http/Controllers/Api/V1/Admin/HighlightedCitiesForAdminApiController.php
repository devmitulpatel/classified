<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreHighlightedCitiesForAdminRequest;
use App\Http\Requests\UpdateHighlightedCitiesForAdminRequest;
use App\Http\Resources\Admin\HighlightedCitiesForAdminResource;
use App\Models\HighlightedCitiesForAdmin;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HighlightedCitiesForAdminApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('highlighted_cities_for_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HighlightedCitiesForAdminResource(HighlightedCitiesForAdmin::all());
    }

    public function store(StoreHighlightedCitiesForAdminRequest $request)
    {
        $highlightedCitiesForAdmin = HighlightedCitiesForAdmin::create($request->all());

        if ($request->input('image', false)) {
            $highlightedCitiesForAdmin->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return (new HighlightedCitiesForAdminResource($highlightedCitiesForAdmin))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(HighlightedCitiesForAdmin $highlightedCitiesForAdmin)
    {
        abort_if(Gate::denies('highlighted_cities_for_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HighlightedCitiesForAdminResource($highlightedCitiesForAdmin);
    }

    public function update(UpdateHighlightedCitiesForAdminRequest $request, HighlightedCitiesForAdmin $highlightedCitiesForAdmin)
    {
        $highlightedCitiesForAdmin->update($request->all());

        if ($request->input('image', false)) {
            if (!$highlightedCitiesForAdmin->image || $request->input('image') !== $highlightedCitiesForAdmin->image->file_name) {
                if ($highlightedCitiesForAdmin->image) {
                    $highlightedCitiesForAdmin->image->delete();
                }

                $highlightedCitiesForAdmin->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($highlightedCitiesForAdmin->image) {
            $highlightedCitiesForAdmin->image->delete();
        }

        return (new HighlightedCitiesForAdminResource($highlightedCitiesForAdmin))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(HighlightedCitiesForAdmin $highlightedCitiesForAdmin)
    {
        abort_if(Gate::denies('highlighted_cities_for_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $highlightedCitiesForAdmin->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
