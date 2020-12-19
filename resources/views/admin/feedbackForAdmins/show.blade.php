@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.feedbackForAdmin.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.feedback-for-admins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.feedbackForAdmin.fields.id') }}
                        </th>
                        <td>
                            {{ $feedbackForAdmin->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feedbackForAdmin.fields.ref_products') }}
                        </th>
                        <td>
                            @foreach($feedbackForAdmin->ref_products as $key => $ref_products)
                                <span class="label label-info">{{ $ref_products->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feedbackForAdmin.fields.ref_services') }}
                        </th>
                        <td>
                            @foreach($feedbackForAdmin->ref_services as $key => $ref_services)
                                <span class="label label-info">{{ $ref_services->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feedbackForAdmin.fields.name') }}
                        </th>
                        <td>
                            {{ $feedbackForAdmin->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feedbackForAdmin.fields.email') }}
                        </th>
                        <td>
                            {{ $feedbackForAdmin->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feedbackForAdmin.fields.company') }}
                        </th>
                        <td>
                            {{ $feedbackForAdmin->company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feedbackForAdmin.fields.content') }}
                        </th>
                        <td>
                            {!! $feedbackForAdmin->content !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.feedback-for-admins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection