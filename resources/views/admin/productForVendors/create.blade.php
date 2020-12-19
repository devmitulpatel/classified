@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.productForVendor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product-for-vendors.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.productForVendor.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productForVendor.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.productForVendor.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productForVendor.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sub_category_id">{{ trans('cruds.productForVendor.fields.sub_category') }}</label>
                <select class="form-control select2 {{ $errors->has('sub_category') ? 'is-invalid' : '' }}" name="sub_category_id" id="sub_category_id" required>
                    @foreach($sub_categories as $id => $sub_category)
                        <option value="{{ $id }}" {{ old('sub_category_id') == $id ? 'selected' : '' }}>{{ $sub_category }}</option>
                    @endforeach
                </select>
                @if($errors->has('sub_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productForVendor.fields.sub_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.productForVendor.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productForVendor.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="imagaes">{{ trans('cruds.productForVendor.fields.imagaes') }}</label>
                <div class="needsclick dropzone {{ $errors->has('imagaes') ? 'is-invalid' : '' }}" id="imagaes-dropzone">
                </div>
                @if($errors->has('imagaes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('imagaes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productForVendor.fields.imagaes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="videos">{{ trans('cruds.productForVendor.fields.videos') }}</label>
                <div class="needsclick dropzone {{ $errors->has('videos') ? 'is-invalid' : '' }}" id="videos-dropzone">
                </div>
                @if($errors->has('videos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('videos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productForVendor.fields.videos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price_start">{{ trans('cruds.productForVendor.fields.price_start') }}</label>
                <input class="form-control {{ $errors->has('price_start') ? 'is-invalid' : '' }}" type="number" name="price_start" id="price_start" value="{{ old('price_start', '0') }}" step="0.01">
                @if($errors->has('price_start'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price_start') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productForVendor.fields.price_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price_max">{{ trans('cruds.productForVendor.fields.price_max') }}</label>
                <input class="form-control {{ $errors->has('price_max') ? 'is-invalid' : '' }}" type="number" name="price_max" id="price_max" value="{{ old('price_max', '0') }}" step="0.01">
                @if($errors->has('price_max'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price_max') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productForVendor.fields.price_max_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shipping_cost">{{ trans('cruds.productForVendor.fields.shipping_cost') }}</label>
                <input class="form-control {{ $errors->has('shipping_cost') ? 'is-invalid' : '' }}" type="number" name="shipping_cost" id="shipping_cost" value="{{ old('shipping_cost', '0') }}" step="0.01">
                @if($errors->has('shipping_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shipping_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productForVendor.fields.shipping_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.productForVendor.fields.tax_included') }}</label>
                <select class="form-control {{ $errors->has('tax_included') ? 'is-invalid' : '' }}" name="tax_included" id="tax_included">
                    <option value disabled {{ old('tax_included', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ProductForVendor::TAX_INCLUDED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tax_included', '0') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tax_included'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax_included') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productForVendor.fields.tax_included_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tax_rate">{{ trans('cruds.productForVendor.fields.tax_rate') }}</label>
                <input class="form-control {{ $errors->has('tax_rate') ? 'is-invalid' : '' }}" type="text" name="tax_rate" id="tax_rate" value="{{ old('tax_rate', '') }}">
                @if($errors->has('tax_rate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax_rate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productForVendor.fields.tax_rate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tags">{{ trans('cruds.productForVendor.fields.tags') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]" id="tags" multiple>
                    @foreach($tags as $id => $tags)
                        <option value="{{ $id }}" {{ in_array($id, old('tags', [])) ? 'selected' : '' }}>{{ $tags }}</option>
                    @endforeach
                </select>
                @if($errors->has('tags'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tags') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productForVendor.fields.tags_helper') }}</span>
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
                xhr.open('POST', '/admin/product-for-vendors/ckmedia', true);
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
                data.append('crud_id', '{{ $productForVendor->id ?? 0 }}');
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

<script>
    var uploadedImagaesMap = {}
Dropzone.options.imagaesDropzone = {
    url: '{{ route('admin.product-for-vendors.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="imagaes[]" value="' + response.name + '">')
      uploadedImagaesMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedImagaesMap[file.name]
      }
      $('form').find('input[name="imagaes[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($productForVendor) && $productForVendor->imagaes)
      var files = {!! json_encode($productForVendor->imagaes) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="imagaes[]" value="' + file.file_name + '">')
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
<script>
    var uploadedVideosMap = {}
Dropzone.options.videosDropzone = {
    url: '{{ route('admin.product-for-vendors.storeMedia') }}',
    maxFilesize: 50, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 50
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="videos[]" value="' + response.name + '">')
      uploadedVideosMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedVideosMap[file.name]
      }
      $('form').find('input[name="videos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($productForVendor) && $productForVendor->videos)
          var files =
            {!! json_encode($productForVendor->videos) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="videos[]" value="' + file.file_name + '">')
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