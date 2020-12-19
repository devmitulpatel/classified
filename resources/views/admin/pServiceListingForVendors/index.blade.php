@extends('layouts.admin')
@section('content')
@can('p_service_listing_for_vendor_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.p-service-listing-for-vendors.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.pServiceListingForVendor.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.pServiceListingForVendor.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PServiceListingForVendor">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.pServiceListingForVendor.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.pServiceListingForVendor.fields.service') }}
                        </th>
                        <th>
                            {{ trans('cruds.pServiceListingForVendor.fields.expire_on') }}
                        </th>
                        <th>
                            {{ trans('cruds.pServiceListingForVendor.fields.start_from') }}
                        </th>
                        <th>
                            {{ trans('cruds.pServiceListingForVendor.fields.active') }}
                        </th>
                        <th>
                            {{ trans('cruds.pServiceListingForVendor.fields.plan') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pServiceListingForVendors as $key => $pServiceListingForVendor)
                        <tr data-entry-id="{{ $pServiceListingForVendor->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $pServiceListingForVendor->id ?? '' }}
                            </td>
                            <td>
                                {{ $pServiceListingForVendor->service->expire_on ?? '' }}
                            </td>
                            <td>
                                {{ $pServiceListingForVendor->expire_on ?? '' }}
                            </td>
                            <td>
                                {{ $pServiceListingForVendor->start_from ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PServiceListingForVendor::ACTIVE_RADIO[$pServiceListingForVendor->active] ?? '' }}
                            </td>
                            <td>
                                {{ $pServiceListingForVendor->plan->name ?? '' }}
                            </td>
                            <td>
                                @can('p_service_listing_for_vendor_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.p-service-listing-for-vendors.show', $pServiceListingForVendor->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('p_service_listing_for_vendor_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.p-service-listing-for-vendors.edit', $pServiceListingForVendor->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('p_service_listing_for_vendor_delete')
                                    <form action="{{ route('admin.p-service-listing-for-vendors.destroy', $pServiceListingForVendor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('p_service_listing_for_vendor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.p-service-listing-for-vendors.massDestroy') }}",
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
  let table = $('.datatable-PServiceListingForVendor:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection