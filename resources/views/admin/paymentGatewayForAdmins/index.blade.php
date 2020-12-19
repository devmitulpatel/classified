@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.paymentGatewayForAdmin.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PaymentGatewayForAdmin">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.paymentGatewayForAdmin.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.paymentGatewayForAdmin.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.paymentGatewayForAdmin.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.paymentGatewayForAdmin.fields.creditinals_title') }}
                        </th>
                        <th>
                            {{ trans('cruds.paymentGatewayForAdmin.fields.creditinals_value') }}
                        </th>
                        <th>
                            {{ trans('cruds.paymentGatewayForAdmin.fields.mode') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paymentGatewayForAdmins as $key => $paymentGatewayForAdmin)
                        <tr data-entry-id="{{ $paymentGatewayForAdmin->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $paymentGatewayForAdmin->id ?? '' }}
                            </td>
                            <td>
                                {{ $paymentGatewayForAdmin->name ?? '' }}
                            </td>
                            <td>
                                @if($paymentGatewayForAdmin->image)
                                    <a href="{{ $paymentGatewayForAdmin->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $paymentGatewayForAdmin->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $paymentGatewayForAdmin->creditinals_title ?? '' }}
                            </td>
                            <td>
                                {{ $paymentGatewayForAdmin->creditinals_value ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PaymentGatewayForAdmin::MODE_SELECT[$paymentGatewayForAdmin->mode] ?? '' }}
                            </td>
                            <td>
                                @can('payment_gateway_for_admin_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.payment-gateway-for-admins.show', $paymentGatewayForAdmin->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('payment_gateway_for_admin_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.payment-gateway-for-admins.edit', $paymentGatewayForAdmin->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan


                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-PaymentGatewayForAdmin:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection