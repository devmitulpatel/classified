@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.topNavigation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.top-navigations.update", [$topNavigation->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.topNavigation.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $topNavigation->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.topNavigation.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="parent_id">{{ trans('cruds.topNavigation.fields.parent') }}</label>
                <select class="form-control select2 {{ $errors->has('parent') ? 'is-invalid' : '' }}" name="parent_id" id="parent_id" required>
                    @foreach($parents as $id => $parent)
                        <option value="{{ $id }}" {{ (old('parent_id') ? old('parent_id') : $topNavigation->parent->id ?? '') == $id ? 'selected' : '' }}>{{ $parent }}</option>
                    @endforeach
                </select>
                @if($errors->has('parent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('parent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.topNavigation.fields.parent_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.topNavigation.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type">
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TopNavigation::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', $topNavigation->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.topNavigation.fields.type_helper') }}</span>
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