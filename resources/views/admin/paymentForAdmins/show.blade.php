@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.paymentForAdmin.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.payment-for-admins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentForAdmin.fields.id') }}
                        </th>
                        <td>
                            {{ $paymentForAdmin->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentForAdmin.fields.method') }}
                        </th>
                        <td>
                            {{ $paymentForAdmin->method->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentForAdmin.fields.user') }}
                        </th>
                        <td>
                            {{ $paymentForAdmin->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentForAdmin.fields.amount') }}
                        </th>
                        <td>
                            {{ $paymentForAdmin->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentForAdmin.fields.plan') }}
                        </th>
                        <td>
                            {{ $paymentForAdmin->plan->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentForAdmin.fields.ref_product') }}
                        </th>
                        <td>
                            @foreach($paymentForAdmin->ref_products as $key => $ref_product)
                                <span class="label label-info">{{ $ref_product->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentForAdmin.fields.ref_service') }}
                        </th>
                        <td>
                            {{ $paymentForAdmin->ref_service->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentForAdmin.fields.approved_by') }}
                        </th>
                        <td>
                            {{ $paymentForAdmin->approved_by->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.payment-for-admins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection