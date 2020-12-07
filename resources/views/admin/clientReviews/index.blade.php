@extends('layouts.admin')
@section('content')
@can('client_review_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.client-reviews.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.clientReview.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.clientReview.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ClientReview">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.clientReview.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientReview.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientReview.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientReview.fields.job_post') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientReview.fields.company') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientReviews as $key => $clientReview)
                        <tr data-entry-id="{{ $clientReview->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $clientReview->id ?? '' }}
                            </td>
                            <td>
                                @if($clientReview->photo)
                                    <a href="{{ $clientReview->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $clientReview->photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $clientReview->name ?? '' }}
                            </td>
                            <td>
                                {{ $clientReview->job_post ?? '' }}
                            </td>
                            <td>
                                {{ $clientReview->company ?? '' }}
                            </td>
                            <td>
                                @can('client_review_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.client-reviews.show', $clientReview->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('client_review_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.client-reviews.edit', $clientReview->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('client_review_delete')
                                    <form action="{{ route('admin.client-reviews.destroy', $clientReview->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('client_review_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.client-reviews.massDestroy') }}",
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
  let table = $('.datatable-ClientReview:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection