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

