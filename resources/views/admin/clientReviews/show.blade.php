@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.clientReview.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.client-reviews.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.clientReview.fields.id') }}
                        </th>
                        <td>
                            {{ $clientReview->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientReview.fields.photo') }}
                        </th>
                        <td>
                            @if($clientReview->photo)
                                <a href="{{ $clientReview->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $clientReview->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientReview.fields.name') }}
                        </th>
                        <td>
                            {{ $clientReview->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientReview.fields.job_post') }}
                        </th>
                        <td>
                            {{ $clientReview->job_post }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientReview.fields.company') }}
                        </th>
                        <td>
                            {{ $clientReview->company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientReview.fields.comment') }}
                        </th>
                        <td>
                            {!! $clientReview->comment !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.client-reviews.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection