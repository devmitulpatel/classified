@extends('layouts.admin')
@section('content')
@can('message_box_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.message-boxes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.messageBox.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.messageBox.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-MessageBox">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.messageBox.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.messageBox.fields.users') }}
                        </th>
                        <th>
                            {{ trans('cruds.messageBox.fields.from') }}
                        </th>
                        <th>
                            {{ trans('cruds.messageBox.fields.message') }}
                        </th>
                        <th>
                            {{ trans('cruds.messageBox.fields.read_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.messageBox.fields.deliver_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.messageBox.fields.files') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messageBoxes as $key => $messageBox)
                        <tr data-entry-id="{{ $messageBox->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $messageBox->id ?? '' }}
                            </td>
                            <td>
                                {{ $messageBox->users->name ?? '' }}
                            </td>
                            <td>
                                {{ $messageBox->from->name ?? '' }}
                            </td>
                            <td>
                                {{ $messageBox->message ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\MessageBox::READ_STATUS_RADIO[$messageBox->read_status] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\MessageBox::DELIVER_STATUS_RADIO[$messageBox->deliver_status] ?? '' }}
                            </td>
                            <td>
                                @foreach($messageBox->files as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('message_box_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.message-boxes.show', $messageBox->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('message_box_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.message-boxes.edit', $messageBox->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('message_box_delete')
                                    <form action="{{ route('admin.message-boxes.destroy', $messageBox->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('message_box_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.message-boxes.massDestroy') }}",
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
  let table = $('.datatable-MessageBox:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection