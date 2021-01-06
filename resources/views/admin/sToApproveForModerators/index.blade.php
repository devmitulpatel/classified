@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.sToApproveForModerator.title') }}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table ref="data-table" class=" table table-bordered table-striped table-hover datatable datatable-ProductForVendor">
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th class="text-center">
                        {{ trans('cruds.productForVendor.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.productForVendor.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.productForVendor.fields.category') }}
                    </th>
                    <th>
                        {{ trans('cruds.productForVendor.fields.sub_category') }}
                    </th>
{{--                    <th>--}}
{{--                        {{ trans('cruds.productForVendor.fields.imagaes') }}--}}
{{--                    </th>--}}
{{--                    <th>--}}
{{--                        {{ trans('cruds.productForVendor.fields.videos') }}--}}
{{--                    </th>--}}
                    <th>
                        {{ trans('cruds.productForVendor.fields.price_start') }}
                    </th>
                    <th>
                        {{ trans('cruds.productForVendor.fields.price_max') }}
                    </th>

                    <th>
                        {{ trans('cruds.productForVendor.fields.tax_rate') }}
                    </th>
                    <th>
                        {{ trans('cruds.productForVendor.fields.tags') }}
                    </th>

                    <th>
                        &nbsp;Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($productForVendors as $key => $productForVendor)
                    <tr data-entry-id="{{ $productForVendor->id }}">
                        <td>

                        </td>
                        <td class="text-center">
                            {{ $productForVendor->id ?? '' }}
                        </td>
                        <td>
                            {{ $productForVendor->name ?? '' }}
                        </td>
                        <td>
                            {{ $productForVendor->category->name ?? '' }}
                        </td>
                        <td>
                            {{ $productForVendor->sub_category->name ?? '' }}
                        </td>
{{--                        <td>--}}
{{--                            @foreach($productForVendor->imagaes as $key => $media)--}}
{{--                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">--}}
{{--                                    <img src="{{ $media->getUrl('thumb') }}">--}}
{{--                                </a>--}}
{{--                            @endforeach--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            @foreach($productForVendor->videos as $key => $media)--}}
{{--                                <a href="{{ $media->getUrl() }}" target="_blank">--}}
{{--                                    {{ trans('global.view_file') }}--}}
{{--                                </a>--}}
{{--                            @endforeach--}}
{{--                        </td>--}}
                        <td>
                            {{ $productForVendor->price_start ?? '' }}
                        </td>
                        <td>
                            {{ $productForVendor->price_max ?? '' }}
                        </td>

                        <td>
                            {{ $productForVendor->tax_rate ?? '' }}
                        </td>
                        <td>
                            @foreach($productForVendor->tags as $key => $item)
                                <span class="badge badge-info">{{ $item->name }}</span>
                            @endforeach
                        </td>

                        <td>



                            @if(auth()->user()->roles->contains(3))

                                @if (auth()->id()==$productForVendor->approved_by_id)



                                    @if($productForVendor->rejected==0)
                                        <a class="btn btn-xs btn-success text-white"  >
                                            Approved
                                        </a>


                                    @else

                                        <a class="btn btn-xs btn-danger text-white"  >
                                            Rejected
                                        </a>
                                    @endif


                                @else

                                    <a class="btn btn-xs btn-info text-white" v-on:click="apiCallOnClick('{{route('admin.s-to-approve-for-moderators.approve',['pid'=>$productForVendor->id,'a'=>true])}}')"  >
                                        Approve
                                    </a>
                                    <a class="btn btn-xs btn-danger text-white" v-on:click="apiCallOnClick('{{route('admin.s-to-approve-for-moderators.approve',['pid'=>$productForVendor->id,'a'=>false])}}')"  >
                                        Reject
                                    </a>

                                @endif

                            @endif

                            @can('service_for_vendor_show')
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.service-for-vendors.show', $productForVendor->id) }}">
                                    {{ trans('global.view') }}
                                </a>
                            @endcan

                            @can('service_for_vendor_edit')
                                <a class="btn btn-xs btn-info" href="{{ route('admin.product-for-vendors.edit', $productForVendor->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                            @endcan

                            @can('product_for_vendor_delete')
                                <form action="{{ route('admin.product-for-vendors.destroy', $productForVendor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                url: "{{ route('admin.product-for-vendors.massDestroy') }}",
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
            let table = $('.datatable-ProductForVendor:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
    <script>



    </script>
@endsection
