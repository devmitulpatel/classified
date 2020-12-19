@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.subCategoryForAdmin.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sub-category-for-admins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.subCategoryForAdmin.fields.id') }}
                        </th>
                        <td>
                            {{ $subCategoryForAdmin->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subCategoryForAdmin.fields.name') }}
                        </th>
                        <td>
                            {{ $subCategoryForAdmin->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subCategoryForAdmin.fields.parent_category') }}
                        </th>
                        <td>
                            {{ $subCategoryForAdmin->parent_category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subCategoryForAdmin.fields.description') }}
                        </th>
                        <td>
                            {{ $subCategoryForAdmin->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subCategoryForAdmin.fields.sub_category_image') }}
                        </th>
                        <td>
                            @if($subCategoryForAdmin->sub_category_image)
                                <a href="{{ $subCategoryForAdmin->sub_category_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $subCategoryForAdmin->sub_category_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sub-category-for-admins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection