@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.serviceForVendor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                @php
                    $backlink=route('admin.service-for-vendors.index');
     if(auth()->user()->roles->contains(3))$backlink=route('admin.s-to-approve-for-moderators.index');
   if(session()->previousUrl()!=null)$backlink=session()->previousUrl();
          //
                @endphp
                <a class="btn btn-default" href="{{ $backlink }}">
                    {{ trans('global.back_to_list') }}
                </a>


                @can('service_for_vendor_edit')
                    <a class="btn  btn-info" href="{{ route('admin.service-for-vendors.edit', $serviceForVendor->id) }}">
                        {{ trans('global.edit') }}
                    </a>
                @endcan

                @can('service_for_vendor_delete')
                    <form action="{{ route('admin.service-for-vendors.destroy', $serviceForVendor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn  btn-danger" value="{{ trans('global.delete') }}">
                    </form>
                @endcan

            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.id') }}
                        </th>
                        <td>
                            {{ $serviceForVendor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.name') }}
                        </th>
                        <td>
                            {{ $serviceForVendor->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.description') }}
                        </th>
                        <td>
                            {!! $serviceForVendor->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.images') }}
                        </th>
                        <td>
                            @foreach($serviceForVendor->images as $key => $media)
                                <div  v-on:click="viewImage('{{ $media->getUrl() }}','{{ $media->file_name }}')" target="_blank" style="display: inline-block;cursor: pointer">
                                    <img src="{{ $media->getUrl('thumb') }}" data-toggle="modal" data-target="#imageModal">
                                </div>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.videos') }}
                        </th>
                        <td>
                            @foreach($serviceForVendor->videos as $key => $media)
                                <button  v-on:click="viewVideo('{{$media->mime_type}}','{{ $media->getUrl() }}','{{ $media->file_name }}')" type="button" class="btn btn-sm btn-primary"
                                         data-toggle="modal" data-target="#videoModal"
                                         title="{{$media->file_name}}" >
                                    <i class="fas fa-video mr-2"></i> {{ $media->file_name }}
                                </button><br>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.category') }}
                        </th>
                        <td>
                            {{ $serviceForVendor->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.sub_category') }}
                        </th>
                        <td>
                            {{ $serviceForVendor->sub_category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.price_start') }}
                        </th>
                        <td>
                            {{config('default_var.website_default_currency')}}  {{ $serviceForVendor->price_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.price_max') }}
                        </th>
                        <td>
                            {{config('default_var.website_default_currency')}}  {{ $serviceForVendor->price_max }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.shipping_cost') }}
                        </th>
                        <td>
                            {{config('default_var.website_default_currency')}}   {{ $serviceForVendor->shipping_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.tax_included') }}
                        </th>
                        <td>
                            {{ App\Models\ServiceForVendor::TAX_INCLUDED_SELECT[$serviceForVendor->tax_included] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.tax_rate') }}
                        </th>
                        <td>
                            {{ $serviceForVendor->tax_rate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.tags') }}
                        </th>
                        <td>
                            @foreach($serviceForVendor->tags as $key => $tags)
                                <span class="label label-info">{{ $tags->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.approved_by') }}
                        </th>
                        <td>
                            {{ $serviceForVendor->approved_by->name ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                           Status
                        </th>
                        <td>
                            @if ($serviceForVendor->approved_by == null)
                                <a class="btn btn-xs btn-info text-white"  >
                                    Pending
                                </a>
                                <br>

                                @if (auth()->user()->roles->contains(MODERATOR_ROLE))
                                <div class="btn-group">
                                        <button class="btn btn-xs" disabled>
                                            Take Action
                                        </button>
                                        <button class="btn btn-xs btn-info text-white" v-on:click="apiCallOnClick('{{route('admin.s-to-approve-for-moderators.approve',['pid'=>$serviceForVendor->id,'a'=>true])}}')"  >
                                            Approve
                                        </button>
                                        <button class="btn btn-xs btn-danger text-white" v-on:click="apiCallOnClick('{{route('admin.s-to-approve-for-moderators.approve',['pid'=>$serviceForVendor->id,'a'=>false])}}')"  >
                                            Reject
                                        </button>

                                    </div>
                                @endif
                            @else
                                @if($serviceForVendor->rejected==0)
                                    <a class="btn btn-xs btn-success text-white"  >
                                        Approved
                                    </a>


                                @else

                                    <a class="btn btn-xs btn-danger text-white"  >
                                        Rejected
                                    </a>
                                @endif
                            @endif

                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ $backlink }}">
                    {{ trans('global.back_to_list') }}
                </a>
                @can('service_for_vendor_edit')
                    <a class="btn  btn-info" href="{{ route('admin.service-for-vendors.edit', $serviceForVendor->id) }}">
                        {{ trans('global.edit') }}
                    </a>
                @endcan

                @can('service_for_vendor_delete')
                    <form action="{{ route('admin.service-for-vendors.destroy', $serviceForVendor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn  btn-danger" value="{{ trans('global.delete') }}">
                    </form>
                @endcan


            </div>
        </div>
    </div>
</div>



@endsection
