<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyClientReviewRequest;
use App\Http\Requests\StoreClientReviewRequest;
use App\Http\Requests\UpdateClientReviewRequest;
use App\Models\ClientReview;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ClientReviewController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('client_review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientReviews = ClientReview::with(['media'])->get();

        return view('admin.clientReviews.index', compact('clientReviews'));
    }

    public function create()
    {
        abort_if(Gate::denies('client_review_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientReviews.create');
    }

    public function store(StoreClientReviewRequest $request)
    {
        $clientReview = ClientReview::create($request->all());

        if ($request->input('photo', false)) {
            $clientReview->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $clientReview->id]);
        }

        return redirect()->route('admin.client-reviews.index');
    }

    public function edit(ClientReview $clientReview)
    {
        abort_if(Gate::denies('client_review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientReviews.edit', compact('clientReview'));
    }

    public function update(UpdateClientReviewRequest $request, ClientReview $clientReview)
    {
        $clientReview->update($request->all());

        if ($request->input('photo', false)) {
            if (!$clientReview->photo || $request->input('photo') !== $clientReview->photo->file_name) {
                if ($clientReview->photo) {
                    $clientReview->photo->delete();
                }

                $clientReview->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($clientReview->photo) {
            $clientReview->photo->delete();
        }

        return redirect()->route('admin.client-reviews.index');
    }

    public function show(ClientReview $clientReview)
    {
        abort_if(Gate::denies('client_review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientReviews.show', compact('clientReview'));
    }

    public function destroy(ClientReview $clientReview)
    {
        abort_if(Gate::denies('client_review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientReview->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientReviewRequest $request)
    {
        ClientReview::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('client_review_create') && Gate::denies('client_review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ClientReview();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
