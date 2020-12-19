@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.paymentGatewayForAdmin.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.payment-gateway-for-admins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentGatewayForAdmin.fields.id') }}
                        </th>
                        <td>
                            {{ $paymentGatewayForAdmin->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentGatewayForAdmin.fields.name') }}
                        </th>
                        <td>
                            {{ $paymentGatewayForAdmin->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentGatewayForAdmin.fields.value') }}
                        </th>
                        <td>
                            {{ $paymentGatewayForAdmin->value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentGatewayForAdmin.fields.display_type') }}
                        </th>
                        <td>
                            {{ App\Models\PaymentGatewayForAdmin::DISPLAY_TYPE_SELECT[$paymentGatewayForAdmin->display_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentGatewayForAdmin.fields.store_type') }}
                        </th>
                        <td>
                            {{ App\Models\PaymentGatewayForAdmin::STORE_TYPE_SELECT[$paymentGatewayForAdmin->store_type] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.payment-gateway-for-admins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection