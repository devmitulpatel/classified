@extends('layouts.admin')
@section('content')
@can('service_for_vendor_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.service-for-vendors.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.serviceForVendor.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.serviceForVendor.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ServiceForVendor">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.images') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.videos') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.sub_category') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.price_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.price_max') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.shipping_cost') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.tax_included') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.tax_rate') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.tags') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.approved_by') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($serviceForVendors as $key => $serviceForVendor)
                        <tr data-entry-id="{{ $serviceForVendor->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $serviceForVendor->id ?? '' }}
                            </td>
                            <td>
                                {{ $serviceForVendor->name ?? '' }}
                            </td>
                            <td>
                                @foreach($serviceForVendor->images as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($serviceForVendor->videos as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $serviceForVendor->category->name ?? '' }}
                            </td>
                            <td>
                                {{ $serviceForVendor->sub_category->name ?? '' }}
                            </td>
                            <td>
                                {{ $serviceForVendor->price_start ?? '' }}
                            </td>
                            <td>
                                {{ $serviceForVendor->price_max ?? '' }}
                            </td>
                            <td>
                                {{ $serviceForVendor->shipping_cost ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\ServiceForVendor::TAX_INCLUDED_SELECT[$serviceForVendor->tax_included] ?? '' }}
                            </td>
                            <td>
                                {{ $serviceForVendor->tax_rate ?? '' }}
                            </td>
                            <td>
                                @foreach($serviceForVendor->tags as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $serviceForVendor->approved_by->name ?? '' }}
                            </td>
                            <td>
                                @can('service_for_vendor_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.service-for-vendors.show', $serviceForVendor->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('service_for_vendor_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.service-for-vendors.edit', $serviceForVendor->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('service_for_vendor_delete')
                                    <form action="{{ route('admin.service-for-vendors.destroy', $serviceForVendor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('service_for_vendor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.service-for-vendors.massDestroy') }}",
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
  let table = $('.datatable-ServiceForVendor:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection