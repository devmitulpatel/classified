@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.websiteSetting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.website-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.websiteSetting.fields.id') }}
                        </th>
                        <td>
                            {{ $websiteSetting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.websiteSetting.fields.name') }}
                        </th>
                        <td>
                            {{ $websiteSetting->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.websiteSetting.fields.value') }}
                        </th>
                        <td>
                            {{ $websiteSetting->value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.websiteSetting.fields.display_type') }}
                        </th>
                        <td>
                            {{ App\Models\WebsiteSetting::DISPLAY_TYPE_SELECT[$websiteSetting->display_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.websiteSetting.fields.store_type') }}
                        </th>
                        <td>
                            {{ App\Models\WebsiteSetting::STORE_TYPE_SELECT[$websiteSetting->store_type] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.website-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection