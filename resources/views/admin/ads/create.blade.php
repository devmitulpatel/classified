@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.ad.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ads.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.ad.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ad.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.ad.fields.ads_location') }}</label>
                <select class="form-control {{ $errors->has('ads_location') ? 'is-invalid' : '' }}" name="ads_location" id="ads_location">
                    <option value disabled {{ old('ads_location', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Ad::ADS_LOCATION_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('ads_location', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('ads_location'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ads_location') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ad.fields.ads_location_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="categories">{{ trans('cruds.ad.fields.categories') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}" name="categories[]" id="categories" multiple>
                    @foreach($categories as $id => $categories)
                        <option value="{{ $id }}" {{ in_array($id, old('categories', [])) ? 'selected' : '' }}>{{ $categories }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                    <div class="invalid-feedback">
                        {{ $errors->first('categories') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ad.fields.categories_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_categories">{{ trans('cruds.ad.fields.sub_categories') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('sub_categories') ? 'is-invalid' : '' }}" name="sub_categories[]" id="sub_categories" multiple>
                    @foreach($sub_categories as $id => $sub_categories)
                        <option value="{{ $id }}" {{ in_array($id, old('sub_categories', [])) ? 'selected' : '' }}>{{ $sub_categories }}</option>
                    @endforeach
                </select>
                @if($errors->has('sub_categories'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_categories') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ad.fields.sub_categories_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="products">{{ trans('cruds.ad.fields.product') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('products') ? 'is-invalid' : '' }}" name="products[]" id="products" multiple>
                    @foreach($products as $id => $product)
                        <option value="{{ $id }}" {{ in_array($id, old('products', [])) ? 'selected' : '' }}>{{ $product }}</option>
                    @endforeach
                </select>
                @if($errors->has('products'))
                    <div class="invalid-feedback">
                        {{ $errors->first('products') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ad.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="services">{{ trans('cruds.ad.fields.services') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('services') ? 'is-invalid' : '' }}" name="services[]" id="services" multiple>
                    @foreach($services as $id => $services)
                        <option value="{{ $id }}" {{ in_array($id, old('services', [])) ? 'selected' : '' }}>{{ $services }}</option>
                    @endforeach
                </select>
                @if($errors->has('services'))
                    <div class="invalid-feedback">
                        {{ $errors->first('services') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ad.fields.services_helper') }}</span>
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