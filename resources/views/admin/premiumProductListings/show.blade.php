@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.premiumProductListing.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.premium-product-listings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.premiumProductListing.fields.id') }}
                        </th>
                        <td>
                            {{ $premiumProductListing->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.premiumProductListing.fields.product') }}
                        </th>
                        <td>
                            {{ $premiumProductListing->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.premiumProductListing.fields.expire_on') }}
                        </th>
                        <td>
                            {{ $premiumProductListing->expire_on }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.premiumProductListing.fields.start_from') }}
                        </th>
                        <td>
                            {{ $premiumProductListing->start_from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.premiumProductListing.fields.active') }}
                        </th>
                        <td>
                            {{ App\Models\PremiumProductListing::ACTIVE_RADIO[$premiumProductListing->active] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.premiumProductListing.fields.plan') }}
                        </th>
                        <td>
                            {{ $premiumProductListing->plan->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.premium-product-listings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection