@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.subCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sub-categories.update", [$subCategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.subCategory.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $subCategory->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subCategory.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parent_category_id">{{ trans('cruds.subCategory.fields.parent_category') }}</label>
                <select class="form-control select2 {{ $errors->has('parent_category') ? 'is-invalid' : '' }}" name="parent_category_id" id="parent_category_id">
                    @foreach($parent_categories as $id => $parent_category)
                        <option value="{{ $id }}" {{ (old('parent_category_id') ? old('parent_category_id') : $subCategory->parent_category->id ?? '') == $id ? 'selected' : '' }}>{{ $parent_category }}</option>
                    @endforeach
                </select>
                @if($errors->has('parent_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('parent_category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subCategory.fields.parent_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.subCategory.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $subCategory->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subCategory.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_category_image">{{ trans('cruds.subCategory.fields.sub_category_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('sub_category_image') ? 'is-invalid' : '' }}" id="sub_category_image-dropzone">
                </div>
                @if($errors->has('sub_category_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_category_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subCategory.fields.sub_category_image_helper') }}</span>
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
    Dropzone.options.subCategoryImageDropzone = {
    url: '{{ route('admin.sub-categories.storeMedia') }}',
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
      $('form').find('input[name="sub_category_image"]').remove()
      $('form').append('<input type="hidden" name="sub_category_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="sub_category_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($subCategory) && $subCategory->sub_category_image)
      var file = {!! json_encode($subCategory->sub_category_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="sub_category_image" value="' + file.file_name + '">')
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
@endsection