@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.paymentForAdmin.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payment-for-admins.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="method_id">{{ trans('cruds.paymentForAdmin.fields.method') }}</label>
                <select class="form-control select2 {{ $errors->has('method') ? 'is-invalid' : '' }}" name="method_id" id="method_id">
                    @foreach($methods as $id => $method)
                        <option value="{{ $id }}" {{ old('method_id') == $id ? 'selected' : '' }}>{{ $method }}</option>
                    @endforeach
                </select>
                @if($errors->has('method'))
                    <div class="invalid-feedback">
                        {{ $errors->first('method') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paymentForAdmin.fields.method_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.paymentForAdmin.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paymentForAdmin.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amount">{{ trans('cruds.paymentForAdmin.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '0') }}" step="0.01">
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paymentForAdmin.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="plan_id">{{ trans('cruds.paymentForAdmin.fields.plan') }}</label>
                <select class="form-control select2 {{ $errors->has('plan') ? 'is-invalid' : '' }}" name="plan_id" id="plan_id">
                    @foreach($plans as $id => $plan)
                        <option value="{{ $id }}" {{ old('plan_id') == $id ? 'selected' : '' }}>{{ $plan }}</option>
                    @endforeach
                </select>
                @if($errors->has('plan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('plan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paymentForAdmin.fields.plan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ref_products">{{ trans('cruds.paymentForAdmin.fields.ref_product') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('ref_products') ? 'is-invalid' : '' }}" name="ref_products[]" id="ref_products" multiple>
                    @foreach($ref_products as $id => $ref_product)
                        <option value="{{ $id }}" {{ in_array($id, old('ref_products', [])) ? 'selected' : '' }}>{{ $ref_product }}</option>
                    @endforeach
                </select>
                @if($errors->has('ref_products'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ref_products') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paymentForAdmin.fields.ref_product_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ref_service_id">{{ trans('cruds.paymentForAdmin.fields.ref_service') }}</label>
                <select class="form-control select2 {{ $errors->has('ref_service') ? 'is-invalid' : '' }}" name="ref_service_id" id="ref_service_id">
                    @foreach($ref_services as $id => $ref_service)
                        <option value="{{ $id }}" {{ old('ref_service_id') == $id ? 'selected' : '' }}>{{ $ref_service }}</option>
                    @endforeach
                </select>
                @if($errors->has('ref_service'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ref_service') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paymentForAdmin.fields.ref_service_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="approved_by_id">{{ trans('cruds.paymentForAdmin.fields.approved_by') }}</label>
                <select class="form-control select2 {{ $errors->has('approved_by') ? 'is-invalid' : '' }}" name="approved_by_id" id="approved_by_id">
                    @foreach($approved_bies as $id => $approved_by)
                        <option value="{{ $id }}" {{ old('approved_by_id') == $id ? 'selected' : '' }}>{{ $approved_by }}</option>
                    @endforeach
                </select>
                @if($errors->has('approved_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('approved_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paymentForAdmin.fields.approved_by_helper') }}</span>
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