@extends('layouts.admin')
@section('content')
@can('categories_for_admin_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.categories-for-admins.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.categoriesForAdmin.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.categoriesForAdmin.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CategoriesForAdmin">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.categoriesForAdmin.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.categoriesForAdmin.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.categoriesForAdmin.fields.img') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categoriesForAdmins as $key => $categoriesForAdmin)
                        <tr data-entry-id="{{ $categoriesForAdmin->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $categoriesForAdmin->id ?? '' }}
                            </td>
                            <td>
                                {{ $categoriesForAdmin->name ?? '' }}
                            </td>
                            <td>
                                @if($categoriesForAdmin->img)
                                    <a href="{{ $categoriesForAdmin->img->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $categoriesForAdmin->img->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('categories_for_admin_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.categories-for-admins.show', $categoriesForAdmin->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('categories_for_admin_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.categories-for-admins.edit', $categoriesForAdmin->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('categories_for_admin_delete')
                                    <form action="{{ route('admin.categories-for-admins.destroy', $categoriesForAdmin->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('categories_for_admin_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.categories-for-admins.massDestroy') }}",
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
  let table = $('.datatable-CategoriesForAdmin:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection