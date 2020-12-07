@extends('layouts.admin')
@section('content')
@can('top_navigation_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.top-navigations.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.topNavigation.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.topNavigation.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TopNavigation">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.topNavigation.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.topNavigation.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.topNavigation.fields.parent') }}
                        </th>
                        <th>
                            {{ trans('cruds.topNavigation.fields.type') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($topNavigations as $key => $topNavigation)
                        <tr data-entry-id="{{ $topNavigation->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $topNavigation->id ?? '' }}
                            </td>
                            <td>
                                {{ $topNavigation->name ?? '' }}
                            </td>
                            <td>
                                {{ $topNavigation->parent->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TopNavigation::TYPE_SELECT[$topNavigation->type] ?? '' }}
                            </td>
                            <td>
                                @can('top_navigation_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.top-navigations.show', $topNavigation->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('top_navigation_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.top-navigations.edit', $topNavigation->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('top_navigation_delete')
                                    <form action="{{ route('admin.top-navigations.destroy', $topNavigation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('top_navigation_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.top-navigations.massDestroy') }}",
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
  let table = $('.datatable-TopNavigation:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection