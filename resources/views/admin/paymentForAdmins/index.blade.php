@extends('layouts.admin')
@section('content')
@can('payment_for_admin_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.payment-for-admins.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.paymentForAdmin.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.paymentForAdmin.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PaymentForAdmin">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.paymentForAdmin.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.paymentForAdmin.fields.method') }}
                        </th>
                        <th>
                            {{ trans('cruds.paymentForAdmin.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.paymentForAdmin.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.paymentForAdmin.fields.plan') }}
                        </th>
                        <th>
                            {{ trans('cruds.paymentForAdmin.fields.ref_product') }}
                        </th>
                        <th>
                            {{ trans('cruds.paymentForAdmin.fields.ref_service') }}
                        </th>
                        <th>
                            {{ trans('cruds.paymentForAdmin.fields.approved_by') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paymentForAdmins as $key => $paymentForAdmin)
                        <tr data-entry-id="{{ $paymentForAdmin->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $paymentForAdmin->id ?? '' }}
                            </td>
                            <td>
                                {{ $paymentForAdmin->method->name ?? '' }}
                            </td>
                            <td>
                                {{ $paymentForAdmin->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $paymentForAdmin->amount ?? '' }}
                            </td>
                            <td>
                                {{ $paymentForAdmin->plan->name ?? '' }}
                            </td>
                            <td>
                                @foreach($paymentForAdmin->ref_products as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $paymentForAdmin->ref_service->name ?? '' }}
                            </td>
                            <td>
                                {{ $paymentForAdmin->approved_by->name ?? '' }}
                            </td>
                            <td>
                                @can('payment_for_admin_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.payment-for-admins.show', $paymentForAdmin->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('payment_for_admin_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.payment-for-admins.edit', $paymentForAdmin->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('payment_for_admin_delete')
                                    <form action="{{ route('admin.payment-for-admins.destroy', $paymentForAdmin->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
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
@can('payment_for_admin_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.payment-for-admins.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-PaymentForAdmin:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection