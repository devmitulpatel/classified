@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pProductListingForVendor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.p-product-listing-for-vendors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pProductListingForVendor.fields.id') }}
                        </th>
                        <td>
                            {{ $pProductListingForVendor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pProductListingForVendor.fields.product') }}
                        </th>
                        <td>
                            {{ $pProductListingForVendor->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pProductListingForVendor.fields.expire_on') }}
                        </th>
                        <td>
                            {{ $pProductListingForVendor->expire_on }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pProductListingForVendor.fields.start_from') }}
                        </th>
                        <td>
                            {{ $pProductListingForVendor->start_from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pProductListingForVendor.fields.active') }}
                        </th>
                        <td>
                            {{ App\Models\PProductListingForVendor::ACTIVE_RADIO[$pProductListingForVendor->active] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pProductListingForVendor.fields.plan') }}
                        </th>
                        <td>
                            {{ $pProductListingForVendor->plan->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.p-product-listing-for-vendors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection