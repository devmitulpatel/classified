@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.messageBox.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.message-boxes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="users_id">{{ trans('cruds.messageBox.fields.users') }}</label>
                <select class="form-control select2 {{ $errors->has('users') ? 'is-invalid' : '' }}" name="users_id" id="users_id" required>
                    @foreach($users as $id => $users)
                        <option value="{{ $id }}" {{ old('users_id') == $id ? 'selected' : '' }}>{{ $users }}</option>
                    @endforeach
                </select>
                @if($errors->has('users'))
                    <div class="invalid-feedback">
                        {{ $errors->first('users') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.messageBox.fields.users_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="from_id">{{ trans('cruds.messageBox.fields.from') }}</label>
                <select class="form-control select2 {{ $errors->has('from') ? 'is-invalid' : '' }}" name="from_id" id="from_id" required>
                    @foreach($froms as $id => $from)
                        <option value="{{ $id }}" {{ old('from_id') == $id ? 'selected' : '' }}>{{ $from }}</option>
                    @endforeach
                </select>
                @if($errors->has('from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('from') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.messageBox.fields.from_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="message">{{ trans('cruds.messageBox.fields.message') }}</label>
                <textarea class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message" id="message" required>{{ old('message') }}</textarea>
                @if($errors->has('message'))
                    <div class="invalid-feedback">
                        {{ $errors->first('message') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.messageBox.fields.message_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.messageBox.fields.read_status') }}</label>
                @foreach(App\Models\MessageBox::READ_STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('read_status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="read_status_{{ $key }}" name="read_status" value="{{ $key }}" {{ old('read_status', '0') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="read_status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('read_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('read_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.messageBox.fields.read_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.messageBox.fields.deliver_status') }}</label>
                @foreach(App\Models\MessageBox::DELIVER_STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('deliver_status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="deliver_status_{{ $key }}" name="deliver_status" value="{{ $key }}" {{ old('deliver_status', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="deliver_status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('deliver_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('deliver_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.messageBox.fields.deliver_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="files">{{ trans('cruds.messageBox.fields.files') }}</label>
                <div class="needsclick dropzone {{ $errors->has('files') ? 'is-invalid' : '' }}" id="files-dropzone">
                </div>
                @if($errors->has('files'))
                    <div class="invalid-feedback">
                        {{ $errors->first('files') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.messageBox.fields.files_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    var uploadedFilesMap = {}
Dropzone.options.filesDropzone = {
    url: '{{ route('admin.message-boxes.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="files[]" value="' + response.name + '">')
      uploadedFilesMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFilesMap[file.name]
      }
      $('form').find('input[name="files[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($messageBox) && $messageBox->files)
          var files =
            {!! json_encode($messageBox->files) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="files[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection