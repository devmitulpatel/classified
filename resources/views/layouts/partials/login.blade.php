
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
                    <div class="form-login" v-if="!loggedin">
                        <form v-on:submit.prevent="submitForm('{{route('home')}}')">
                            <div class="font-size-md text-dark mb-5">Log In Your Account</div>
                            <div class="form-group mb-2">
                                <label for="username" class="sr-only">Username</label>
                                <input id="username" v-model="input.username" type="text" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group mb-3">
                                <div class="input-group flex-nowrap align-items-center">
                                    <label for="password" class="sr-only">Password</label>
                                    <input id="password" v-model="input.password" type="password" class="form-control" placeholder="Password">
                                    <a href="#" class="input-group-append text-decoration-none">Forgot?</a>
                                </div>
                            </div>

                            <div>
                                <div class="alert alert-danger " role="alert" v-for="er in error">
                                    <small>@{{ er.message }}</small>
                                </div>
                            </div>

                            <div class="form-group mb-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="check">
                                    <label class="custom-control-label text-dark" for="check">Remember</label>
                                </div>
                            </div>
                            <button type="submit"  class="btn btn-primary btn-block font-weight-bold text-uppercase font-size-lg rounded-sm mb-8">
                                Log In
                            </button>
                        </form>
                        <div class="font-size-md text-dark mb-5">Or Log In With</div>
                        <div class="social-icon origin-color si-square">
                            <ul class="row no-gutters list-inline text-center">
                                <li class="list-inline-item si-facebook col-3">
                                    <a target="_blank" title="Facebook" href="#">
                                        <i class="fab fa-facebook-f">
                                        </i>
                                        <span>Facebook</span>
                                    </a>
                                </li>
                                <li class="list-inline-item si-twitter col-3">
                                    <a target="_blank" title="Twitter" href="#">
                                        <i class="fab fa-twitter">
                                        </i>
                                        <span>Twitter</span>
                                    </a>
                                </li>
                                <li class="list-inline-item si-google col-3">
                                    <a target="_blank" title="Google plus" href="#">
                                        <svg class="icon icon-google-plus-symbol">
                                            <use xlink:href="#icon-google-plus-symbol"></use>
                                        </svg>
                                        <span>Google plus</span>
                                    </a>
                                </li>
                                <li class="list-inline-item si-rss col-3">
                                    <a target="_blank" title="RSS" href="#">
                                        <i class="fas fa-rss"></i>
                                        <span>RSS</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade " id="register" role="tabpanel" aria-labelledby="register-tab">
                    <div class="form-register">
                        <form  v-on:submit.prevent="submitFormForRegistration()">
                            <div class="font-size-md text-dark mb-5">Create Your Account</div>

                            <div class="form-group mb-2">
                                <label for="email" class="sr-only">Email</label>
                                <input id="email" :class="{ 'is-invalid':checkError('username')}" v-model="input.username" type="text" class="form-control" placeholder="Email Address">
                                <div class="invalid-feedback" v-if="checkError('username')">
                                    Please choose a username.
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label for="password-rt" class="sr-only">Username</label>
                                <input id="password-rt" v-model="input.password" type="password" class="form-control" placeholder="Password">
                                <div class="invalid-feedback" v-if="checkError('username')">
                                    Please choose a username.
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="r-c-password" class="sr-only">Confirm Password</label>
                                <input id="r-c-password" type="password" v-model="input.confirm_password" class="form-control" placeholder="Retype password">
                            </div>

                            <div class="form-group mb-3">
                                <label for="r-c-password" class="sr-only">Select City</label>


                                <multiselect v-model="selectedCountries" id="ajax" label="text" track-by="value" placeholder="Type to search city"  :options="countries" :multiple="false" :searchable="true" :loading="isLoading" :internal-search="true" :clear-on-select="false" :close-on-select="true" :max-height="600" @search-change="asyncFind">
                                    <template slot="singleLabel" slot-scope="props"><span>  @{{ props.option.text }} </span></template>
                                    <template slot="noOptions" ><span>  No city selected </span></template>
                                    <template slot="noResult" ><span> No city found   </span></template>
                                </multiselect>





                            </div>
                            <div class="form-group mb-8">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="check-term">
                                    <label class="custom-control-label text-dark" for="check-term">Yes, I agree
                                        all Terms & Privacy Policy.</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block font-weight-bold text-uppercase font-size-lg rounded-sm">
                                Create an
                                account
                            </button>
                        </form>
                    </div>
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
                    <button type="button"  v-on:click="click('{{route('user_dashboard')}}')" class="btn btn-lg btn-info btn-block">Go to Dashboard</button>
                </div>
            </div>



        </div>

    </div>
</login-section>
