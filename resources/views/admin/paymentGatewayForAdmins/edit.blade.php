@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.paymentGatewayForAdmin.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payment-gateway-for-admins.update", [$paymentGatewayForAdmin->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.paymentGatewayForAdmin.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $paymentGatewayForAdmin->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paymentGatewayForAdmin.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image">{{ trans('cruds.paymentGatewayForAdmin.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paymentGatewayForAdmin.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="creditinals_title">{{ trans('cruds.paymentGatewayForAdmin.fields.creditinals_title') }}</label>
                <textarea class="form-control {{ $errors->has('creditinals_title') ? 'is-invalid' : '' }}" name="creditinals_title" id="creditinals_title">{{ old('creditinals_title', $paymentGatewayForAdmin->creditinals_title) }}</textarea>
                @if($errors->has('creditinals_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('creditinals_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paymentGatewayForAdmin.fields.creditinals_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="creditinals_value">{{ trans('cruds.paymentGatewayForAdmin.fields.creditinals_value') }}</label>
                <textarea class="form-control {{ $errors->has('creditinals_value') ? 'is-invalid' : '' }}" name="creditinals_value" id="creditinals_value">{{ old('creditinals_value', $paymentGatewayForAdmin->creditinals_value) }}</textarea>
                @if($errors->has('creditinals_value'))
                    <div class="invalid-feedback">
                        {{ $errors->first('creditinals_value') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paymentGatewayForAdmin.fields.creditinals_value_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.paymentGatewayForAdmin.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $paymentGatewayForAdmin->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paymentGatewayForAdmin.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.paymentGatewayForAdmin.fields.mode') }}</label>
                <select class="form-control {{ $errors->has('mode') ? 'is-invalid' : '' }}" name="mode" id="mode">
                    <option value disabled {{ old('mode', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PaymentGatewayForAdmin::MODE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('mode', $paymentGatewayForAdmin->mode) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('mode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mode') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paymentGatewayForAdmin.fields.mode_helper') }}</span>
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
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.payment-gateway-for-admins.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($paymentGatewayForAdmin) && $paymentGatewayForAdmin->image)
      var file = {!! json_encode($paymentGatewayForAdmin->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/payment-gateway-for-admins/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $paymentGatewayForAdmin->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection