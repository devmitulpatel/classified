<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyFeedbackForAdminRequest;
use App\Http\Requests\StoreFeedbackForAdminRequest;
use App\Http\Requests\UpdateFeedbackForAdminRequest;
use App\Models\FeedbackForAdmin;
use App\Models\ProductForVendor;
use App\Models\ServiceForVendor;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class FeedbackForAdminController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('feedback_for_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feedbackForAdmins = FeedbackForAdmin::with(['ref_products', 'ref_services'])->get();

        return view('admin.feedbackForAdmins.index', compact('feedbackForAdmins'));
    }

    public function create()
    {
        abort_if(Gate::denies('feedback_for_admin_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ref_products = ProductForVendor::all()->pluck('name', 'id');

        $ref_services = ServiceForVendor::all()->pluck('name', 'id');

        return view('admin.feedbackForAdmins.create', compact('ref_products', 'ref_services'));
    }

    public function store(StoreFeedbackForAdminRequest $request)
    {
        $feedbackForAdmin = FeedbackForAdmin::create($request->all());
        $feedbackForAdmin->ref_products()->sync($request->input('ref_products', []));
        $feedbackForAdmin->ref_services()->sync($request->input('ref_services', []));

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $feedbackForAdmin->id]);
        }

        return redirect()->route('admin.feedback-for-admins.index');
    }

    public function edit(FeedbackForAdmin $feedbackForAdmin)
    {
        abort_if(Gate::denies('feedback_for_admin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ref_products = ProductForVendor::all()->pluck('name', 'id');

        $ref_services = ServiceForVendor::all()->pluck('name', 'id');

        $feedbackForAdmin->load('ref_products', 'ref_services');

        return view('admin.feedbackForAdmins.edit', compact('ref_products', 'ref_services', 'feedbackForAdmin'));
    }

    public function update(UpdateFeedbackForAdminRequest $request, FeedbackForAdmin $feedbackForAdmin)
    {
        $feedbackForAdmin->update($request->all());
        $feedbackForAdmin->ref_products()->sync($request->input('ref_products', []));
        $feedbackForAdmin->ref_services()->sync($request->input('ref_services', []));

        return redirect()->route('admin.feedback-for-admins.index');
    }

    public function show(FeedbackForAdmin $feedbackForAdmin)
    {
        abort_if(Gate::denies('feedback_for_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feedbackForAdmin->load('ref_products', 'ref_services');

        return view('admin.feedbackForAdmins.show', compact('feedbackForAdmin'));
    }

    public function destroy(FeedbackForAdmin $feedbackForAdmin)
    {
        abort_if(Gate::denies('feedback_for_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feedbackForAdmin->delete();

        return back();
    }

    public function massDestroy(MassDestroyFeedbackForAdminRequest $request)
    {
        FeedbackForAdmin::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('feedback_for_admin_create') && Gate::denies('feedback_for_admin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new FeedbackForAdmin();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
