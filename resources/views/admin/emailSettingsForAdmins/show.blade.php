@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.emailSettingsForAdmin.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.email-settings-for-admins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.emailSettingsForAdmin.fields.id') }}
                        </th>
                        <td>
                            {{ $emailSettingsForAdmin->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailSettingsForAdmin.fields.name') }}
                        </th>
                        <td>
                            {{ $emailSettingsForAdmin->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailSettingsForAdmin.fields.value') }}
                        </th>
                        <td>
                            {{ $emailSettingsForAdmin->value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailSettingsForAdmin.fields.display_type') }}
                        </th>
                        <td>
                            {{ App\Models\EmailSettingsForAdmin::DISPLAY_TYPE_SELECT[$emailSettingsForAdmin->display_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailSettingsForAdmin.fields.store_type') }}
                        </th>
                        <td>
                            {{ App\Models\EmailSettingsForAdmin::STORE_TYPE_SELECT[$emailSettingsForAdmin->store_type] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.email-settings-for-admins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection