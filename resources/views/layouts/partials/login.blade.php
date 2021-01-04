
@php
$url=[
    'loginPost'=>route('loginForFrontEnd'),
    'logoutPost'=>route('logoutForFrontEnd'),
    'registerPost'=>route('registerForFrontEnd')
];
$url=collect($url)->toJson();
@endphp

<login-section inline-template id="login-popup" refCreate Your Account="login-model" class="mfp-hide" :urls="{{ $url  }}">
    <div class="form-login-register" >
        <div v-if="!loggedin">
            <div class="tabs mb-8">
                <ul class="nav nav-pills tab-style-01 text-capitalize justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true"><h3>Log In</h3></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false"><h3>Register</h3></a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                    @include('layouts.partials.login_form')
                </div>
                <div class="tab-pane fade " id="register" role="tabpanel" aria-labelledby="register-tab">
                    @include('layouts.partials.register_form ')
                </div>
            </div>
        </div>
        <div v-if="loggedin">


            <div class="card text-center">
                <div class="card-block pb-5 pt-5">
                    <i class="fa fa-user fa-5x mb-5 "></i><br>
                    ID: @{{ user.uid }}<br>
                    email: @{{ user.email }}


                </div>

                <div class="card-footer">
                    <button type="button" v-on:click="signOutUser" class="btn btn-lg btn-danger btn-block">Sign Out</button>


                    @if(request()->path()=='user' || request()->path()=='vendor')
                        <button type="button"  v-on:click="click('{{route('home')}}')" class="btn btn-lg btn-info btn-block">Go to Home Page</button>
                    @endif
                    @if(request()->path()!='user' && request()->path()!='vendor')
                    <button type="button"  v-on:click="click('{{route('user_dashboard')}}')" class="btn btn-lg btn-info btn-block">Go to Dashboard</button>
                    @endif
                </div>
            </div>



        </div>

    </div>
</login-section>
