@extends('layouts.admin')
@section('content')
@can('website_setting_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.website-settings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.websiteSetting.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.websiteSetting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-WebsiteSetting">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.websiteSetting.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.websiteSetting.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.websiteSetting.fields.value') }}
                        </th>
                        <th>
                            {{ trans('cruds.websiteSetting.fields.display_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.websiteSetting.fields.store_type') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($websiteSettings as $key => $websiteSetting)
                        <tr data-entry-id="{{ $websiteSetting->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $websiteSetting->id ?? '' }}
                            </td>
                            <td>
                                {{ $websiteSetting->name ?? '' }}
                            </td>
                            <td>
                                {{ $websiteSetting->value ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\WebsiteSetting::DISPLAY_TYPE_SELECT[$websiteSetting->display_type] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\WebsiteSetting::STORE_TYPE_SELECT[$websiteSetting->store_type] ?? '' }}
                            </td>
                            <td>
                                @can('website_setting_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.website-settings.show', $websiteSetting->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('website_setting_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.website-settings.edit', $websiteSetting->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('website_setting_delete')
                                    <form action="{{ route('admin.website-settings.destroy', $websiteSetting->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('website_setting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.website-settings.massDestroy') }}",
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
  let table = $('.datatable-WebsiteSetting:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection