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

          //
                @endphp
                <a class="btn btn-default" href="{{ $backlink }}">
                    {{ trans('global.back_to_list') }}
                </a>
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
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.videos') }}
                        </th>
                        <td>
                            @foreach($serviceForVendor->videos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
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
                            {{ $serviceForVendor->price_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.price_max') }}
                        </th>
                        <td>
                            {{ $serviceForVendor->price_max }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceForVendor.fields.shipping_cost') }}
                        </th>
                        <td>
                            {{ $serviceForVendor->shipping_cost }}
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
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ $backlink }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
