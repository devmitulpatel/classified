@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ad.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ad.fields.id') }}
                        </th>
                        <td>
                            {{ $ad->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ad.fields.name') }}
                        </th>
                        <td>
                            {{ $ad->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ad.fields.ads_location') }}
                        </th>
                        <td>
                            {{ App\Models\Ad::ADS_LOCATION_SELECT[$ad->ads_location] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ad.fields.categories') }}
                        </th>
                        <td>
                            @foreach($ad->categories as $key => $categories)
                                <span class="label label-info">{{ $categories->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ad.fields.sub_categories') }}
                        </th>
                        <td>
                            @foreach($ad->sub_categories as $key => $sub_categories)
                                <span class="label label-info">{{ $sub_categories->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ad.fields.product') }}
                        </th>
                        <td>
                            @foreach($ad->products as $key => $product)
                                <span class="label label-info">{{ $product->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ad.fields.services') }}
                        </th>
                        <td>
                            @foreach($ad->services as $key => $services)
                                <span class="label label-info">{{ $services->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection