@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.plan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.plans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.id') }}
                        </th>
                        <td>
                            {{ $plan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.name') }}
                        </th>
                        <td>
                            {{ $plan->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.monthly_active') }}
                        </th>
                        <td>
                            {{ App\Models\Plan::MONTHLY_ACTIVE_RADIO[$plan->monthly_active] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.monthly_cost') }}
                        </th>
                        <td>
                            {{ $plan->monthly_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.half_year_active') }}
                        </th>
                        <td>
                            {{ App\Models\Plan::HALF_YEAR_ACTIVE_RADIO[$plan->half_year_active] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.half_yearly_cost') }}
                        </th>
                        <td>
                            {{ $plan->half_yearly_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.yearly_active') }}
                        </th>
                        <td>
                            {{ App\Models\Plan::YEARLY_ACTIVE_RADIO[$plan->yearly_active] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.yearly_cost') }}
                        </th>
                        <td>
                            {{ $plan->yearly_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.two_year_bundle_active') }}
                        </th>
                        <td>
                            {{ App\Models\Plan::TWO_YEAR_BUNDLE_ACTIVE_RADIO[$plan->two_year_bundle_active] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.two_year_bundle_cost') }}
                        </th>
                        <td>
                            {{ $plan->two_year_bundle_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.three_year_bundle_active') }}
                        </th>
                        <td>
                            {{ App\Models\Plan::THREE_YEAR_BUNDLE_ACTIVE_RADIO[$plan->three_year_bundle_active] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.three_year_bundle_cost') }}
                        </th>
                        <td>
                            {{ $plan->three_year_bundle_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.life_time_active') }}
                        </th>
                        <td>
                            {{ App\Models\Plan::LIFE_TIME_ACTIVE_RADIO[$plan->life_time_active] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.life_time_cost') }}
                        </th>
                        <td>
                            {{ $plan->life_time_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.currency') }}
                        </th>
                        <td>
                            {{ $plan->currency }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.plans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection