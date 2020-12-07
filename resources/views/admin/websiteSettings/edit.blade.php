@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.websiteSetting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.website-settings.update", [$websiteSetting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.websiteSetting.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $websiteSetting->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.websiteSetting.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="value">{{ trans('cruds.websiteSetting.fields.value') }}</label>
                <textarea class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" name="value" id="value" required>{{ old('value', $websiteSetting->value) }}</textarea>
                @if($errors->has('value'))
                    <div class="invalid-feedback">
                        {{ $errors->first('value') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.websiteSetting.fields.value_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.websiteSetting.fields.display_type') }}</label>
                <select class="form-control {{ $errors->has('display_type') ? 'is-invalid' : '' }}" name="display_type" id="display_type" required>
                    <option value disabled {{ old('display_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\WebsiteSetting::DISPLAY_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('display_type', $websiteSetting->display_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('display_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('display_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.websiteSetting.fields.display_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.websiteSetting.fields.store_type') }}</label>
                <select class="form-control {{ $errors->has('store_type') ? 'is-invalid' : '' }}" name="store_type" id="store_type" required>
                    <option value disabled {{ old('store_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\WebsiteSetting::STORE_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('store_type', $websiteSetting->store_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('store_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('store_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.websiteSetting.fields.store_type_helper') }}</span>
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