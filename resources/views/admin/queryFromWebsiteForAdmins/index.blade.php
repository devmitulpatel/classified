@extends('layouts.admin')
@section('content')
@can('query_from_website_for_admin_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.query-from-website-for-admins.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.queryFromWebsiteForAdmin.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.queryFromWebsiteForAdmin.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-QueryFromWebsiteForAdmin">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.queryFromWebsiteForAdmin.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.queryFromWebsiteForAdmin.fields.ref_products') }}
                        </th>
                        <th>
                            {{ trans('cruds.queryFromWebsiteForAdmin.fields.ref_services') }}
                        </th>
                        <th>
                            {{ trans('cruds.queryFromWebsiteForAdmin.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.queryFromWebsiteForAdmin.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.queryFromWebsiteForAdmin.fields.company') }}
                        </th>
                        <th>
                            {{ trans('cruds.queryFromWebsiteForAdmin.fields.contact_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.queryFromWebsiteForAdmin.fields.current_status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($queryFromWebsiteForAdmins as $key => $queryFromWebsiteForAdmin)
                        <tr data-entry-id="{{ $queryFromWebsiteForAdmin->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $queryFromWebsiteForAdmin->id ?? '' }}
                            </td>
                            <td>
                                @foreach($queryFromWebsiteForAdmin->ref_products as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($queryFromWebsiteForAdmin->ref_services as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $queryFromWebsiteForAdmin->name ?? '' }}
                            </td>
                            <td>
                                {{ $queryFromWebsiteForAdmin->email ?? '' }}
                            </td>
                            <td>
                                {{ $queryFromWebsiteForAdmin->company ?? '' }}
                            </td>
                            <td>
                                {{ $queryFromWebsiteForAdmin->contact_no ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\QueryFromWebsiteForAdmin::CURRENT_STATUS_SELECT[$queryFromWebsiteForAdmin->current_status] ?? '' }}
                            </td>
                            <td>
                                @can('query_from_website_for_admin_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.query-from-website-for-admins.show', $queryFromWebsiteForAdmin->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('query_from_website_for_admin_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.query-from-website-for-admins.edit', $queryFromWebsiteForAdmin->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('query_from_website_for_admin_delete')
                                    <form action="{{ route('admin.query-from-website-for-admins.destroy', $queryFromWebsiteForAdmin->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('query_from_website_for_admin_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.query-from-website-for-admins.massDestroy') }}",
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
  let table = $('.datatable-QueryFromWebsiteForAdmin:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection