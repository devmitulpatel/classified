<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMessageBoxRequest;
use App\Http\Requests\StoreMessageBoxRequest;
use App\Http\Requests\UpdateMessageBoxRequest;
use App\Models\MessageBox;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MessageBoxController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('message_box_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $messageBoxes = MessageBox::with(['users', 'from', 'created_by', 'media'])->get();

        return view('admin.messageBoxes.index', compact('messageBoxes'));
    }

    public function create()
    {
        abort_if(Gate::denies('message_box_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $froms = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.messageBoxes.create', compact('users', 'froms'));
    }

    public function store(StoreMessageBoxRequest $request)
    {
        $messageBox = MessageBox::create($request->all());

        foreach ($request->input('files', []) as $file) {
            $messageBox->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('files');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $messageBox->id]);
        }

        return redirect()->route('admin.message-boxes.index');
    }

    public function edit(MessageBox $messageBox)
    {
        abort_if(Gate::denies('message_box_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $froms = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $messageBox->load('users', 'from', 'created_by');

        return view('admin.messageBoxes.edit', compact('users', 'froms', 'messageBox'));
    }

    public function update(UpdateMessageBoxRequest $request, MessageBox $messageBox)
    {
        $messageBox->update($request->all());

        if (count($messageBox->files) > 0) {
            foreach ($messageBox->files as $media) {
                if (!in_array($media->file_name, $request->input('files', []))) {
                    $media->delete();
                }
            }
        }

        $media = $messageBox->files->pluck('file_name')->toArray();

        foreach ($request->input('files', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $messageBox->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('files');
            }
        }

        return redirect()->route('admin.message-boxes.index');
    }

    public function show(MessageBox $messageBox)
    {
        abort_if(Gate::denies('message_box_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $messageBox->load('users', 'from', 'created_by');

        return view('admin.messageBoxes.show', compact('messageBox'));
    }

    public function destroy(MessageBox $messageBox)
    {
        abort_if(Gate::denies('message_box_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $messageBox->delete();

        return back();
    }

    public function massDestroy(MassDestroyMessageBoxRequest $request)
    {
        MessageBox::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('message_box_create') && Gate::denies('message_box_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new MessageBox();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
