@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.messageBox.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.message-boxes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.messageBox.fields.id') }}
                        </th>
                        <td>
                            {{ $messageBox->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.messageBox.fields.users') }}
                        </th>
                        <td>
                            {{ $messageBox->users->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.messageBox.fields.from') }}
                        </th>
                        <td>
                            {{ $messageBox->from->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.messageBox.fields.message') }}
                        </th>
                        <td>
                            {{ $messageBox->message }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.messageBox.fields.read_status') }}
                        </th>
                        <td>
                            {{ App\Models\MessageBox::READ_STATUS_RADIO[$messageBox->read_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.messageBox.fields.deliver_status') }}
                        </th>
                        <td>
                            {{ App\Models\MessageBox::DELIVER_STATUS_RADIO[$messageBox->deliver_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.messageBox.fields.files') }}
                        </th>
                        <td>
                            @foreach($messageBox->files as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.message-boxes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection