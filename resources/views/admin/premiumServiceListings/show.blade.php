@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.premiumServiceListing.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.premium-service-listings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.premiumServiceListing.fields.id') }}
                        </th>
                        <td>
                            {{ $premiumServiceListing->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.premiumServiceListing.fields.service') }}
                        </th>
                        <td>
                            {{ $premiumServiceListing->service->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.premiumServiceListing.fields.expire_on') }}
                        </th>
                        <td>
                            {{ $premiumServiceListing->expire_on }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.premiumServiceListing.fields.start_from') }}
                        </th>
                        <td>
                            {{ $premiumServiceListing->start_from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.premiumServiceListing.fields.active') }}
                        </th>
                        <td>
                            {{ App\Models\PremiumServiceListing::ACTIVE_RADIO[$premiumServiceListing->active] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.premiumServiceListing.fields.plan') }}
                        </th>
                        <td>
                            {{ $premiumServiceListing->plan->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.premium-service-listings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection