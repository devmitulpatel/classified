@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.categoriesForAdmin.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categories-for-admins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.categoriesForAdmin.fields.id') }}
                        </th>
                        <td>
                            {{ $categoriesForAdmin->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoriesForAdmin.fields.name') }}
                        </th>
                        <td>
                            {{ $categoriesForAdmin->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoriesForAdmin.fields.description') }}
                        </th>
                        <td>
                            {!! $categoriesForAdmin->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoriesForAdmin.fields.img') }}
                        </th>
                        <td>
                            @if($categoriesForAdmin->img)
                                <a href="{{ $categoriesForAdmin->img->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $categoriesForAdmin->img->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categories-for-admins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection