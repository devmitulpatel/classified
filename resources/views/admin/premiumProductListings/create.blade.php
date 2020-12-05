@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.premiumProductListing.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.premium-product-listings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="product_id">{{ trans('cruds.premiumProductListing.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id">
                    @foreach($products as $id => $product)
                        <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $product }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.premiumProductListing.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="expire_on">{{ trans('cruds.premiumProductListing.fields.expire_on') }}</label>
                <input class="form-control date {{ $errors->has('expire_on') ? 'is-invalid' : '' }}" type="text" name="expire_on" id="expire_on" value="{{ old('expire_on') }}" required>
                @if($errors->has('expire_on'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expire_on') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.premiumProductListing.fields.expire_on_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_from">{{ trans('cruds.premiumProductListing.fields.start_from') }}</label>
                <input class="form-control date {{ $errors->has('start_from') ? 'is-invalid' : '' }}" type="text" name="start_from" id="start_from" value="{{ old('start_from') }}" required>
                @if($errors->has('start_from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_from') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.premiumProductListing.fields.start_from_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.premiumProductListing.fields.active') }}</label>
                @foreach(App\Models\PremiumProductListing::ACTIVE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="active_{{ $key }}" name="active" value="{{ $key }}" {{ old('active', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="active_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.premiumProductListing.fields.active_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="plan_id">{{ trans('cruds.premiumProductListing.fields.plan') }}</label>
                <select class="form-control select2 {{ $errors->has('plan') ? 'is-invalid' : '' }}" name="plan_id" id="plan_id" required>
                    @foreach($plans as $id => $plan)
                        <option value="{{ $id }}" {{ old('plan_id') == $id ? 'selected' : '' }}>{{ $plan }}</option>
                    @endforeach
                </select>
                @if($errors->has('plan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('plan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.premiumProductListing.fields.plan_helper') }}</span>
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