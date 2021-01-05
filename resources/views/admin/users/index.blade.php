@extends('layouts.admin')
@section('content')
@can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.users.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive"  id="live_table_data">
            @php
                $model=\App\Models\Role::all();
                $allRoles=$model->pluck('title','id')->toArray();
            @endphp
            <div class="row justify-content-center">

                <div class="col text-right">
                    <label for="current_view_only flex ">View only : </label>
                </div>

                <div class="col-11">
                      <select name="current_view_only" id="current_view_only" data-target="live_table_data" class="form-select pl-2 col">
                            <option value="0" selected>
                                All
                            </option>
                            @foreach ($allRoles as $v=>$t)
                                @if (auth()->user()->roles->contains(ADMIN_ROLE))
                                  <option value="{{$v}}">
                                      {{ $t }}
                                  </option>
                                @endif

                                @if (auth()->user()->roles->contains(MODERATOR_ROLE))
                                        @if($v != ADMIN_ROLE && $v!=MODERATOR_ROLE)
                                            <option value="{{$v}}">
                                                {{ $t }}
                                            </option>
                                        @endif
                                @endif

                            @endforeach

                        </select>

                </div>



        </div>


            <div>
                <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.state') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.country') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.pincode') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.area') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.contact_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.approved_by') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody >
                    @if(true)
                        @foreach($users as $key => $user)
                            <tr data-entry-id="{{ $user->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $user->id ?? '' }}
                                </td>
                                <td>
                                    {{ $user->name ?? '' }}
                                </td>
                                <td>
                                    {{ $user->email ?? '' }}
                                </td>
                                <td>
                                    {{ $user->email_verified_at ?? '' }}
                                </td>
                                <td>
                                    @foreach($user->roles as $key => $item)
                                        <span class="badge badge-info">{{ $item->title }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $user->city ?? '' }}
                                </td>
                                <td>
                                    {{ $user->state ?? '' }}
                                </td>
                                <td>
                                    {{ $user->country ?? '' }}
                                </td>
                                <td>
                                    {{ $user->pincode ?? '' }}
                                </td>
                                <td>
                                    {{ $user->area ?? '' }}
                                </td>
                                <td>
                                    {{ $user->contact_no ?? '' }}
                                </td>
                                <td>
                                    {{ $user->approved_by->name ?? '' }}
                                </td>
                                <td>
                                    @can('user_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', $user->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('user_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', $user->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('user_delete')
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
    @can('user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.users.massDestroy') }}",
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

    $('#current_view_only').on( "change",
    function (e){
        var target=$('#'+$(this).data('target'));
        target.slideUp();

        var url='{{route('admin.users.indexData')}}';
        var viewById=e.target.value;
        axios.post(url ,{role:viewById}).then(res=>{
            target.html(res.data);
        }).finally(()=>{target.slideDown();});

    }
    );


    $.extend(true, $.fn.dataTable.defaults, {
        orderCellsTop: true,
        order: [[ 1, 'desc' ]],
        pageLength: 10,

  });
    let table = $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
