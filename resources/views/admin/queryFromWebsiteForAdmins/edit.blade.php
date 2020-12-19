@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.queryFromWebsiteForAdmin.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.query-from-website-for-admins.update", [$queryFromWebsiteForAdmin->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="ref_products">{{ trans('cruds.queryFromWebsiteForAdmin.fields.ref_products') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('ref_products') ? 'is-invalid' : '' }}" name="ref_products[]" id="ref_products" multiple>
                    @foreach($ref_products as $id => $ref_products)
                        <option value="{{ $id }}" {{ (in_array($id, old('ref_products', [])) || $queryFromWebsiteForAdmin->ref_products->contains($id)) ? 'selected' : '' }}>{{ $ref_products }}</option>
                    @endforeach
                </select>
                @if($errors->has('ref_products'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ref_products') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.queryFromWebsiteForAdmin.fields.ref_products_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ref_services">{{ trans('cruds.queryFromWebsiteForAdmin.fields.ref_services') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('ref_services') ? 'is-invalid' : '' }}" name="ref_services[]" id="ref_services" multiple>
                    @foreach($ref_services as $id => $ref_services)
                        <option value="{{ $id }}" {{ (in_array($id, old('ref_services', [])) || $queryFromWebsiteForAdmin->ref_services->contains($id)) ? 'selected' : '' }}>{{ $ref_services }}</option>
                    @endforeach
                </select>
                @if($errors->has('ref_services'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ref_services') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.queryFromWebsiteForAdmin.fields.ref_services_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.queryFromWebsiteForAdmin.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $queryFromWebsiteForAdmin->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.queryFromWebsiteForAdmin.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.queryFromWebsiteForAdmin.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $queryFromWebsiteForAdmin->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.queryFromWebsiteForAdmin.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="company">{{ trans('cruds.queryFromWebsiteForAdmin.fields.company') }}</label>
                <input class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" type="text" name="company" id="company" value="{{ old('company', $queryFromWebsiteForAdmin->company) }}">
                @if($errors->has('company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.queryFromWebsiteForAdmin.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="content">{{ trans('cruds.queryFromWebsiteForAdmin.fields.content') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content">{!! old('content', $queryFromWebsiteForAdmin->content) !!}</textarea>
                @if($errors->has('content'))
                    <div class="invalid-feedback">
                        {{ $errors->first('content') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.queryFromWebsiteForAdmin.fields.content_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_no">{{ trans('cruds.queryFromWebsiteForAdmin.fields.contact_no') }}</label>
                <input class="form-control {{ $errors->has('contact_no') ? 'is-invalid' : '' }}" type="text" name="contact_no" id="contact_no" value="{{ old('contact_no', $queryFromWebsiteForAdmin->contact_no) }}">
                @if($errors->has('contact_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.queryFromWebsiteForAdmin.fields.contact_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.queryFromWebsiteForAdmin.fields.current_status') }}</label>
                <select class="form-control {{ $errors->has('current_status') ? 'is-invalid' : '' }}" name="current_status" id="current_status">
                    <option value disabled {{ old('current_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\QueryFromWebsiteForAdmin::CURRENT_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('current_status', $queryFromWebsiteForAdmin->current_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('current_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('current_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.queryFromWebsiteForAdmin.fields.current_status_helper') }}</span>
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
                xhr.open('POST', '/admin/query-from-website-for-admins/ckmedia', true);
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
                data.append('crud_id', '{{ $queryFromWebsiteForAdmin->id ?? 0 }}');
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