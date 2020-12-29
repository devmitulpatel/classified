@extends('layouts.admin')
@section('content')


<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col-4">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">{{ trans('global.my_profile') }}</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile"> {{ trans('global.change_password') }}</a>
                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">{{ trans('global.delete_account') }}</a>

                </div>
            </div>
            <div class="col-8">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        <div class="card">
                            <div class="card-body">

                                <form method="POST" action="{{ route("profile.password.updateProfile",['for'=>'moderator']) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" required>
                                        @if($errors->has('name'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="required" for="title">{{ trans('cruds.user.fields.email') }}</label>
                                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required>
                                        @if($errors->has('email'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-danger" type="submit">
                                            {{ trans('global.save') }}
                                        </button>
                                    </div>
                                </form></div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route("profile.password.update") }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="required" for="title">New {{ trans('cruds.user.fields.password') }}</label>
                                        <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                                        @if($errors->has('password'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="required" for="title">Repeat New {{ trans('cruds.user.fields.password') }}</label>
                                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-danger" type="submit">
                                            {{ trans('global.save') }}
                                        </button>
                                    </div>
                                </form></div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                        <div class="card">
                            <div class="card-body">
                                <h4>Are Sure you want to delete your account ?
                                <br><small class="text-danger " > Note: after deleting your account your data will be deleted from server and can not be recovered in future. </small>
                                </h4>
                                <form class="mt-5" method="POST" action="{{ route("profile.password.destroyProfile") }}" onsubmit="return prompt('{{ __('global.delete_account_warning') }}') == '{{ auth()->user()->email }}'">
                                    @csrf
                                    <div class="form-group">
                                        <button class="btn btn-danger btn-block btn-lg" type="submit">
                                            {{ trans('global.delete') }}
                                        </button>
                                    </div>
                                </form></div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</div>


@endsection
