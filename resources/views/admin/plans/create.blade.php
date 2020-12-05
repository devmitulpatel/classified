@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.plan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.plans.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.plan.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.plan.fields.monthly_active') }}</label>
                @foreach(App\Models\Plan::MONTHLY_ACTIVE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('monthly_active') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="monthly_active_{{ $key }}" name="monthly_active" value="{{ $key }}" {{ old('monthly_active', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="monthly_active_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('monthly_active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('monthly_active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.monthly_active_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="monthly_cost">{{ trans('cruds.plan.fields.monthly_cost') }}</label>
                <input class="form-control {{ $errors->has('monthly_cost') ? 'is-invalid' : '' }}" type="number" name="monthly_cost" id="monthly_cost" value="{{ old('monthly_cost', '0.0') }}" step="0.01">
                @if($errors->has('monthly_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('monthly_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.monthly_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.plan.fields.half_year_active') }}</label>
                @foreach(App\Models\Plan::HALF_YEAR_ACTIVE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('half_year_active') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="half_year_active_{{ $key }}" name="half_year_active" value="{{ $key }}" {{ old('half_year_active', '0') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="half_year_active_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('half_year_active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('half_year_active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.half_year_active_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="half_yearly_cost">{{ trans('cruds.plan.fields.half_yearly_cost') }}</label>
                <input class="form-control {{ $errors->has('half_yearly_cost') ? 'is-invalid' : '' }}" type="number" name="half_yearly_cost" id="half_yearly_cost" value="{{ old('half_yearly_cost', '0.0') }}" step="0.01">
                @if($errors->has('half_yearly_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('half_yearly_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.half_yearly_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.plan.fields.yearly_active') }}</label>
                @foreach(App\Models\Plan::YEARLY_ACTIVE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('yearly_active') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="yearly_active_{{ $key }}" name="yearly_active" value="{{ $key }}" {{ old('yearly_active', '0') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="yearly_active_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('yearly_active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('yearly_active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.yearly_active_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="yearly_cost">{{ trans('cruds.plan.fields.yearly_cost') }}</label>
                <input class="form-control {{ $errors->has('yearly_cost') ? 'is-invalid' : '' }}" type="number" name="yearly_cost" id="yearly_cost" value="{{ old('yearly_cost', '0.0') }}" step="0.01">
                @if($errors->has('yearly_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('yearly_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.yearly_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.plan.fields.two_year_bundle_active') }}</label>
                @foreach(App\Models\Plan::TWO_YEAR_BUNDLE_ACTIVE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('two_year_bundle_active') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="two_year_bundle_active_{{ $key }}" name="two_year_bundle_active" value="{{ $key }}" {{ old('two_year_bundle_active', '0') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="two_year_bundle_active_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('two_year_bundle_active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('two_year_bundle_active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.two_year_bundle_active_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="two_year_bundle_cost">{{ trans('cruds.plan.fields.two_year_bundle_cost') }}</label>
                <input class="form-control {{ $errors->has('two_year_bundle_cost') ? 'is-invalid' : '' }}" type="number" name="two_year_bundle_cost" id="two_year_bundle_cost" value="{{ old('two_year_bundle_cost', '0.0') }}" step="0.01">
                @if($errors->has('two_year_bundle_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('two_year_bundle_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.two_year_bundle_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.plan.fields.three_year_bundle_active') }}</label>
                @foreach(App\Models\Plan::THREE_YEAR_BUNDLE_ACTIVE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('three_year_bundle_active') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="three_year_bundle_active_{{ $key }}" name="three_year_bundle_active" value="{{ $key }}" {{ old('three_year_bundle_active', '0') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="three_year_bundle_active_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('three_year_bundle_active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('three_year_bundle_active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.three_year_bundle_active_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="three_year_bundle_cost">{{ trans('cruds.plan.fields.three_year_bundle_cost') }}</label>
                <input class="form-control {{ $errors->has('three_year_bundle_cost') ? 'is-invalid' : '' }}" type="number" name="three_year_bundle_cost" id="three_year_bundle_cost" value="{{ old('three_year_bundle_cost', '0.0') }}" step="0.01">
                @if($errors->has('three_year_bundle_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('three_year_bundle_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.three_year_bundle_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.plan.fields.life_time_active') }}</label>
                @foreach(App\Models\Plan::LIFE_TIME_ACTIVE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('life_time_active') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="life_time_active_{{ $key }}" name="life_time_active" value="{{ $key }}" {{ old('life_time_active', '0') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="life_time_active_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('life_time_active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('life_time_active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.life_time_active_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="life_time_cost">{{ trans('cruds.plan.fields.life_time_cost') }}</label>
                <input class="form-control {{ $errors->has('life_time_cost') ? 'is-invalid' : '' }}" type="number" name="life_time_cost" id="life_time_cost" value="{{ old('life_time_cost', '0.0') }}" step="0.01">
                @if($errors->has('life_time_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('life_time_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.life_time_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="currency">{{ trans('cruds.plan.fields.currency') }}</label>
                <input class="form-control {{ $errors->has('currency') ? 'is-invalid' : '' }}" type="number" name="currency" id="currency" value="{{ old('currency', '') }}" step="1">
                @if($errors->has('currency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('currency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.currency_helper') }}</span>
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