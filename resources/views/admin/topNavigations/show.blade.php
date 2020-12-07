@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.topNavigation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.top-navigations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.topNavigation.fields.id') }}
                        </th>
                        <td>
                            {{ $topNavigation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.topNavigation.fields.name') }}
                        </th>
                        <td>
                            {{ $topNavigation->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.topNavigation.fields.parent') }}
                        </th>
                        <td>
                            {{ $topNavigation->parent->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.topNavigation.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\TopNavigation::TYPE_SELECT[$topNavigation->type] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.top-navigations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection