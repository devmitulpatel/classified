@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.feedbackForAdmin.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.feedback-for-admins.update", [$feedbackForAdmin->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="ref_products">{{ trans('cruds.feedbackForAdmin.fields.ref_products') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('ref_products') ? 'is-invalid' : '' }}" name="ref_products[]" id="ref_products" multiple>
                    @foreach($ref_products as $id => $ref_products)
                        <option value="{{ $id }}" {{ (in_array($id, old('ref_products', [])) || $feedbackForAdmin->ref_products->contains($id)) ? 'selected' : '' }}>{{ $ref_products }}</option>
                    @endforeach
                </select>
                @if($errors->has('ref_products'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ref_products') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feedbackForAdmin.fields.ref_products_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ref_services">{{ trans('cruds.feedbackForAdmin.fields.ref_services') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('ref_services') ? 'is-invalid' : '' }}" name="ref_services[]" id="ref_services" multiple>
                    @foreach($ref_services as $id => $ref_services)
                        <option value="{{ $id }}" {{ (in_array($id, old('ref_services', [])) || $feedbackForAdmin->ref_services->contains($id)) ? 'selected' : '' }}>{{ $ref_services }}</option>
                    @endforeach
                </select>
                @if($errors->has('ref_services'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ref_services') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feedbackForAdmin.fields.ref_services_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.feedbackForAdmin.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $feedbackForAdmin->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feedbackForAdmin.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.feedbackForAdmin.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $feedbackForAdmin->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feedbackForAdmin.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="company">{{ trans('cruds.feedbackForAdmin.fields.company') }}</label>
                <input class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" type="text" name="company" id="company" value="{{ old('company', $feedbackForAdmin->company) }}">
                @if($errors->has('company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feedbackForAdmin.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="content">{{ trans('cruds.feedbackForAdmin.fields.content') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content">{!! old('content', $feedbackForAdmin->content) !!}</textarea>
                @if($errors->has('content'))
                    <div class="invalid-feedback">
                        {{ $errors->first('content') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feedbackForAdmin.fields.content_helper') }}</span>
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
                xhr.open('POST', '/admin/feedback-for-admins/ckmedia', true);
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
                data.append('crud_id', '{{ $feedbackForAdmin->id ?? 0 }}');
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