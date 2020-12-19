@extends('layouts.admin')
@section('content')
@can('p_product_listing_for_vendor_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.p-product-listing-for-vendors.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.pProductListingForVendor.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.pProductListingForVendor.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PProductListingForVendor">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.pProductListingForVendor.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.pProductListingForVendor.fields.product') }}
                        </th>
                        <th>
                            {{ trans('cruds.pProductListingForVendor.fields.expire_on') }}
                        </th>
                        <th>
                            {{ trans('cruds.pProductListingForVendor.fields.start_from') }}
                        </th>
                        <th>
                            {{ trans('cruds.pProductListingForVendor.fields.active') }}
                        </th>
                        <th>
                            {{ trans('cruds.pProductListingForVendor.fields.plan') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pProductListingForVendors as $key => $pProductListingForVendor)
                        <tr data-entry-id="{{ $pProductListingForVendor->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $pProductListingForVendor->id ?? '' }}
                            </td>
                            <td>
                                {{ $pProductListingForVendor->product->name ?? '' }}
                            </td>
                            <td>
                                {{ $pProductListingForVendor->expire_on ?? '' }}
                            </td>
                            <td>
                                {{ $pProductListingForVendor->start_from ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PProductListingForVendor::ACTIVE_RADIO[$pProductListingForVendor->active] ?? '' }}
                            </td>
                            <td>
                                {{ $pProductListingForVendor->plan->name ?? '' }}
                            </td>
                            <td>
                                @can('p_product_listing_for_vendor_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.p-product-listing-for-vendors.show', $pProductListingForVendor->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('p_product_listing_for_vendor_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.p-product-listing-for-vendors.edit', $pProductListingForVendor->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('p_product_listing_for_vendor_delete')
                                    <form action="{{ route('admin.p-product-listing-for-vendors.destroy', $pProductListingForVendor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('p_product_listing_for_vendor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.p-product-listing-for-vendors.massDestroy') }}",
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
    pageLength: 10,
  });
  let table = $('.datatable-PProductListingForVendor:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection