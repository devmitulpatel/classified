<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreClientReviewRequest;
use App\Http\Requests\UpdateClientReviewRequest;
use App\Http\Resources\Admin\ClientReviewResource;
use App\Models\ClientReview;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientReviewApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('client_review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClientReviewResource(ClientReview::all());
    }

    public function store(StoreClientReviewRequest $request)
    {
        $clientReview = ClientReview::create($request->all());

        if ($request->input('photo', false)) {
            $clientReview->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return (new ClientReviewResource($clientReview))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ClientReview $clientReview)
    {
        abort_if(Gate::denies('client_review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClientReviewResource($clientReview);
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

        return (new ClientReviewResource($clientReview))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ClientReview $clientReview)
    {
        abort_if(Gate::denies('client_review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientReview->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
