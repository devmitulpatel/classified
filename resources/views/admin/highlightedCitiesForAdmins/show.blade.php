@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.highlightedCitiesForAdmin.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.highlighted-cities-for-admins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.highlightedCitiesForAdmin.fields.id') }}
                        </th>
                        <td>
                            {{ $highlightedCitiesForAdmin->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.highlightedCitiesForAdmin.fields.name') }}
                        </th>
                        <td>
                            {{ $highlightedCitiesForAdmin->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.highlightedCitiesForAdmin.fields.decription') }}
                        </th>
                        <td>
                            {!! $highlightedCitiesForAdmin->decription !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.highlightedCitiesForAdmin.fields.image') }}
                        </th>
                        <td>
                            @if($highlightedCitiesForAdmin->image)
                                <a href="{{ $highlightedCitiesForAdmin->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $highlightedCitiesForAdmin->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.highlightedCitiesForAdmin.fields.digital_location') }}
                        </th>
                        <td>
                            {{ $highlightedCitiesForAdmin->digital_location }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.highlighted-cities-for-admins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection