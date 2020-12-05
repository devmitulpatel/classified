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
                <label for="img">{{ trans('cruds.subCategory.fields.img') }}</label>
                <input class="form-control {{ $errors->has('img') ? 'is-invalid' : '' }}" type="text" name="img" id="img" value="{{ old('img', $subCategory->img) }}">
                @if($errors->has('img'))
                    <div class="invalid-feedback">
                        {{ $errors->first('img') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subCategory.fields.img_helper') }}</span>
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