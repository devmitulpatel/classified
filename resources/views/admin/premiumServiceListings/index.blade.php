@extends('layouts.admin')
@section('content')
@can('premium_service_listing_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.premium-service-listings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.premiumServiceListing.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.premiumServiceListing.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PremiumServiceListing">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.premiumServiceListing.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.premiumServiceListing.fields.service') }}
                        </th>
                        <th>
                            {{ trans('cruds.premiumServiceListing.fields.expire_on') }}
                        </th>
                        <th>
                            {{ trans('cruds.premiumServiceListing.fields.start_from') }}
                        </th>
                        <th>
                            {{ trans('cruds.premiumServiceListing.fields.active') }}
                        </th>
                        <th>
                            {{ trans('cruds.premiumServiceListing.fields.plan') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($premiumServiceListings as $key => $premiumServiceListing)
                        <tr data-entry-id="{{ $premiumServiceListing->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $premiumServiceListing->id ?? '' }}
                            </td>
                            <td>
                                {{ $premiumServiceListing->service->name ?? '' }}
                            </td>
                            <td>
                                {{ $premiumServiceListing->expire_on ?? '' }}
                            </td>
                            <td>
                                {{ $premiumServiceListing->start_from ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PremiumServiceListing::ACTIVE_RADIO[$premiumServiceListing->active] ?? '' }}
                            </td>
                            <td>
                                {{ $premiumServiceListing->plan->name ?? '' }}
                            </td>
                            <td>
                                @can('premium_service_listing_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.premium-service-listings.show', $premiumServiceListing->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('premium_service_listing_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.premium-service-listings.edit', $premiumServiceListing->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('premium_service_listing_delete')
                                    <form action="{{ route('admin.premium-service-listings.destroy', $premiumServiceListing->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('premium_service_listing_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.premium-service-listings.massDestroy') }}",
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
  let table = $('.datatable-PremiumServiceListing:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection