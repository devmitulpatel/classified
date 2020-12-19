@extends('layouts.admin')
@section('content')
@can('sub_category_for_admin_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sub-category-for-admins.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.subCategoryForAdmin.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.subCategoryForAdmin.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SubCategoryForAdmin">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.subCategoryForAdmin.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.subCategoryForAdmin.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.subCategoryForAdmin.fields.parent_category') }}
                        </th>
                        <th>
                            {{ trans('cruds.subCategoryForAdmin.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.subCategoryForAdmin.fields.sub_category_image') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subCategoryForAdmins as $key => $subCategoryForAdmin)
                        <tr data-entry-id="{{ $subCategoryForAdmin->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $subCategoryForAdmin->id ?? '' }}
                            </td>
                            <td>
                                {{ $subCategoryForAdmin->name ?? '' }}
                            </td>
                            <td>
                                {{ $subCategoryForAdmin->parent_category->name ?? '' }}
                            </td>
                            <td>
                                {{ $subCategoryForAdmin->description ?? '' }}
                            </td>
                            <td>
                                @if($subCategoryForAdmin->sub_category_image)
                                    <a href="{{ $subCategoryForAdmin->sub_category_image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $subCategoryForAdmin->sub_category_image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('sub_category_for_admin_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.sub-category-for-admins.show', $subCategoryForAdmin->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('sub_category_for_admin_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.sub-category-for-admins.edit', $subCategoryForAdmin->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('sub_category_for_admin_delete')
                                    <form action="{{ route('admin.sub-category-for-admins.destroy', $subCategoryForAdmin->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('sub_category_for_admin_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sub-category-for-admins.massDestroy') }}",
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
  let table = $('.datatable-SubCategoryForAdmin:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection