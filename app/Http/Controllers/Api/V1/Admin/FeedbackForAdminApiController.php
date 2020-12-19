<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreFeedbackForAdminRequest;
use App\Http\Requests\UpdateFeedbackForAdminRequest;
use App\Http\Resources\Admin\FeedbackForAdminResource;
use App\Models\FeedbackForAdmin;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FeedbackForAdminApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('feedback_for_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FeedbackForAdminResource(FeedbackForAdmin::with(['ref_products', 'ref_services'])->get());
    }

    public function store(StoreFeedbackForAdminRequest $request)
    {
        $feedbackForAdmin = FeedbackForAdmin::create($request->all());
        $feedbackForAdmin->ref_products()->sync($request->input('ref_products', []));
        $feedbackForAdmin->ref_services()->sync($request->input('ref_services', []));

        return (new FeedbackForAdminResource($feedbackForAdmin))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(FeedbackForAdmin $feedbackForAdmin)
    {
        abort_if(Gate::denies('feedback_for_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FeedbackForAdminResource($feedbackForAdmin->load(['ref_products', 'ref_services']));
    }

    public function update(UpdateFeedbackForAdminRequest $request, FeedbackForAdmin $feedbackForAdmin)
    {
        $feedbackForAdmin->update($request->all());
        $feedbackForAdmin->ref_products()->sync($request->input('ref_products', []));
        $feedbackForAdmin->ref_services()->sync($request->input('ref_services', []));

        return (new FeedbackForAdminResource($feedbackForAdmin))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(FeedbackForAdmin $feedbackForAdmin)
    {
        abort_if(Gate::denies('feedback_for_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feedbackForAdmin->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
