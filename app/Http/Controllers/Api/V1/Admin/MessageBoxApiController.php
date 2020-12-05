<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreMessageBoxRequest;
use App\Http\Requests\UpdateMessageBoxRequest;
use App\Http\Resources\Admin\MessageBoxResource;
use App\Models\MessageBox;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MessageBoxApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('message_box_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MessageBoxResource(MessageBox::with(['users', 'from', 'created_by'])->get());
    }

    public function store(StoreMessageBoxRequest $request)
    {
        $messageBox = MessageBox::create($request->all());

        if ($request->input('files', false)) {
            $messageBox->addMedia(storage_path('tmp/uploads/' . $request->input('files')))->toMediaCollection('files');
        }

        return (new MessageBoxResource($messageBox))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MessageBox $messageBox)
    {
        abort_if(Gate::denies('message_box_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MessageBoxResource($messageBox->load(['users', 'from', 'created_by']));
    }

    public function update(UpdateMessageBoxRequest $request, MessageBox $messageBox)
    {
        $messageBox->update($request->all());

        if ($request->input('files', false)) {
            if (!$messageBox->files || $request->input('files') !== $messageBox->files->file_name) {
                if ($messageBox->files) {
                    $messageBox->files->delete();
                }

                $messageBox->addMedia(storage_path('tmp/uploads/' . $request->input('files')))->toMediaCollection('files');
            }
        } elseif ($messageBox->files) {
            $messageBox->files->delete();
        }

        return (new MessageBoxResource($messageBox))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MessageBox $messageBox)
    {
        abort_if(Gate::denies('message_box_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $messageBox->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
