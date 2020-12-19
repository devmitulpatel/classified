@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.queryFromWebsiteForAdmin.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.query-from-website-for-admins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.queryFromWebsiteForAdmin.fields.id') }}
                        </th>
                        <td>
                            {{ $queryFromWebsiteForAdmin->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.queryFromWebsiteForAdmin.fields.ref_products') }}
                        </th>
                        <td>
                            @foreach($queryFromWebsiteForAdmin->ref_products as $key => $ref_products)
                                <span class="label label-info">{{ $ref_products->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.queryFromWebsiteForAdmin.fields.ref_services') }}
                        </th>
                        <td>
                            @foreach($queryFromWebsiteForAdmin->ref_services as $key => $ref_services)
                                <span class="label label-info">{{ $ref_services->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.queryFromWebsiteForAdmin.fields.name') }}
                        </th>
                        <td>
                            {{ $queryFromWebsiteForAdmin->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.queryFromWebsiteForAdmin.fields.email') }}
                        </th>
                        <td>
                            {{ $queryFromWebsiteForAdmin->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.queryFromWebsiteForAdmin.fields.company') }}
                        </th>
                        <td>
                            {{ $queryFromWebsiteForAdmin->company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.queryFromWebsiteForAdmin.fields.content') }}
                        </th>
                        <td>
                            {!! $queryFromWebsiteForAdmin->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.queryFromWebsiteForAdmin.fields.contact_no') }}
                        </th>
                        <td>
                            {{ $queryFromWebsiteForAdmin->contact_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.queryFromWebsiteForAdmin.fields.current_status') }}
                        </th>
                        <td>
                            {{ App\Models\QueryFromWebsiteForAdmin::CURRENT_STATUS_SELECT[$queryFromWebsiteForAdmin->current_status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.query-from-website-for-admins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection