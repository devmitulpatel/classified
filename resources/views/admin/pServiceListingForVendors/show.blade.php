@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pServiceListingForVendor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.p-service-listing-for-vendors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pServiceListingForVendor.fields.id') }}
                        </th>
                        <td>
                            {{ $pServiceListingForVendor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pServiceListingForVendor.fields.service') }}
                        </th>
                        <td>
                            {{ $pServiceListingForVendor->service->expire_on ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pServiceListingForVendor.fields.expire_on') }}
                        </th>
                        <td>
                            {{ $pServiceListingForVendor->expire_on }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pServiceListingForVendor.fields.start_from') }}
                        </th>
                        <td>
                            {{ $pServiceListingForVendor->start_from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pServiceListingForVendor.fields.active') }}
                        </th>
                        <td>
                            {{ App\Models\PServiceListingForVendor::ACTIVE_RADIO[$pServiceListingForVendor->active] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pServiceListingForVendor.fields.plan') }}
                        </th>
                        <td>
                            {{ $pServiceListingForVendor->plan->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.p-service-listing-for-vendors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection