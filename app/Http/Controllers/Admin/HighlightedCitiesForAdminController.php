<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHighlightedCitiesForAdminRequest;
use App\Http\Requests\StoreHighlightedCitiesForAdminRequest;
use App\Http\Requests\UpdateHighlightedCitiesForAdminRequest;
use App\Models\HighlightedCitiesForAdmin;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class HighlightedCitiesForAdminController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('highlighted_cities_for_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $highlightedCitiesForAdmins = HighlightedCitiesForAdmin::with(['media'])->get();

        return view('admin.highlightedCitiesForAdmins.index', compact('highlightedCitiesForAdmins'));
    }

    public function create()
    {
        abort_if(Gate::denies('highlighted_cities_for_admin_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.highlightedCitiesForAdmins.create');
    }

    public function store(StoreHighlightedCitiesForAdminRequest $request)
    {
        $highlightedCitiesForAdmin = HighlightedCitiesForAdmin::create($request->all());

        if ($request->input('image', false)) {
            $highlightedCitiesForAdmin->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $highlightedCitiesForAdmin->id]);
        }

        return redirect()->route('admin.highlighted-cities-for-admins.index');
    }

    public function edit(HighlightedCitiesForAdmin $highlightedCitiesForAdmin)
    {
        abort_if(Gate::denies('highlighted_cities_for_admin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.highlightedCitiesForAdmins.edit', compact('highlightedCitiesForAdmin'));
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

        return redirect()->route('admin.highlighted-cities-for-admins.index');
    }

    public function show(HighlightedCitiesForAdmin $highlightedCitiesForAdmin)
    {
        abort_if(Gate::denies('highlighted_cities_for_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.highlightedCitiesForAdmins.show', compact('highlightedCitiesForAdmin'));
    }

    public function destroy(HighlightedCitiesForAdmin $highlightedCitiesForAdmin)
    {
        abort_if(Gate::denies('highlighted_cities_for_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $highlightedCitiesForAdmin->delete();

        return back();
    }

    public function massDestroy(MassDestroyHighlightedCitiesForAdminRequest $request)
    {
        HighlightedCitiesForAdmin::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('highlighted_cities_for_admin_create') && Gate::denies('highlighted_cities_for_admin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new HighlightedCitiesForAdmin();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
