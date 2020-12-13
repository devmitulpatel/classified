<login-section inline-template id="login-popup" class="mfp-hide">
    <div class="form-login-register">
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
                <div class="form-login">
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
                    <form>
                        <div class="font-size-md text-dark mb-5">Create Your Account</div>
                        <div class="form-group mb-2">
                            <label for="username-rt" class="sr-only">Username</label>
                            <input id="username-rt" type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group mb-2">
                            <label for="email" class="sr-only">Email</label>
                            <input id="email" type="text" class="form-control" placeholder="Email Address">
                        </div>
                        <div class="form-group mb-2">
                            <label for="password-rt" class="sr-only">Username</label>
                            <input id="password-rt" type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group mb-3">
                            <label for="r-password" class="sr-only">Username</label>
                            <input id="r-password" type="password" class="form-control" placeholder="Retype password">
                        </div>
                        <div class="form-group mb-8">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check-term">
                                <label class="custom-control-label text-dark" for="check-term">You agree with our
                                    Terms Privacy Policy and</label>
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
        <form>
        </form>
    </div>
</login-section>
