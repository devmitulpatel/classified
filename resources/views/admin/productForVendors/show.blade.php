@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productForVendor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                @php
                $backlink=route('admin.product-for-vendors.index');
 if(auth()->user()->roles->contains(3))$backlink=route('admin.p-to-approve-for-moderators.index');

      //
                @endphp
                <a class="btn btn-default" href="{{$backlink}}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.productForVendor.fields.id') }}
                        </th>
                        <td>
                            {{ $productForVendor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productForVendor.fields.name') }}
                        </th>
                        <td>
                            {{ $productForVendor->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productForVendor.fields.category') }}
                        </th>
                        <td>
                            {{ $productForVendor->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productForVendor.fields.sub_category') }}
                        </th>
                        <td>
                            {{ $productForVendor->sub_category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productForVendor.fields.description') }}
                        </th>
                        <td>
                            {!! $productForVendor->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productForVendor.fields.imagaes') }}
                        </th>
                        <td>


                            @foreach($productForVendor->imagaes as $key => $media)


                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productForVendor.fields.videos') }}
                        </th>
                        <td>
                            @foreach($productForVendor->videos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productForVendor.fields.price_start') }}
                        </th>
                        <td>
                            {{ $productForVendor->price_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productForVendor.fields.price_max') }}
                        </th>
                        <td>
                            {{ $productForVendor->price_max }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productForVendor.fields.shipping_cost') }}
                        </th>
                        <td>
                            {{ $productForVendor->shipping_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productForVendor.fields.tax_included') }}
                        </th>
                        <td>
                            {{ App\Models\ProductForVendor::TAX_INCLUDED_SELECT[$productForVendor->tax_included] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productForVendor.fields.tax_rate') }}
                        </th>
                        <td>
                            {{ $productForVendor->tax_rate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productForVendor.fields.tags') }}
                        </th>
                        <td>
                            @foreach($productForVendor->tags as $key => $tags)
                                <span class="label label-info">{{ $tags->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productForVendor.fields.approved_by') }}
                        </th>
                        <td>
                            {{ $productForVendor->approved_by->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{$backlink}}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
