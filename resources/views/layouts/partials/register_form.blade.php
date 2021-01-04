<div class="form-register">
    <form  v-on:submit.prevent="submitFormForRegistration()" class="">
        <div class="font-size-md text-dark mb-5">Create Your Account</div>

        <div class="form-group mb-2">
            <label for="email" class="sr-only">Email</label>
            <input id="email" :class="{ 'is-invalid':checkError('username')}" v-model.trim="input.username" type="text" v-on:keyup="validateMe($event,'username')" class="form-control" placeholder="Email Address">
            <div class="invalid-feedback c-err" v-if="checkError('username')">

                                    <span v-for="er in regError.username">
                                            @{{ er }}
                                    </span>
            </div>
        </div>
        <div class="form-group mb-2">
            <label for="password-rt" class="sr-only">Username</label>
            <input id="password-rt" v-model.trim="input.password" :class="{ 'is-invalid':checkError('password')}" type="password" class="form-control" placeholder="Password">
            <div class="invalid-feedback c-err" v-if="checkError('password')">
                                    <span v-for="er in regError.password">
                                           @{{ er }}
                                    </span>
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="r-c-password" class="sr-only">Confirm Password</label>
            <input id="r-c-password" type="password" :class="{ 'is-invalid':checkError('password_confirmation')}"  v-model.trim="input.password_confirmation" class="form-control" placeholder="Retype password">
            <div class="invalid-feedback c-err" v-if=" checkError('password_confirmation') ">

                                         <span v-for="er in regError.password_confirmation" >

                                            @{{ er }}

                                            </span>

            </div>
        </div>

        <div class="form-group mb-3">
            <label for="r-c-password" class="sr-only">Select City</label>


            <multiselect open-direction="bottom" :preserve-search="true" :class="{ 'is-invalid':checkError('city')}" v-model="selectedCountries" id="ajax" label="text" track-by="value" placeholder="Type to search city"  :options="countries" :multiple="false" :searchable="true" :loading="isLoading" :internal-search="true" :clear-on-select="false" :close-on-select="true" :max-height="600" @search-change="asyncFind">
                <template slot="singleLabel" slot-scope="props"><span>  @{{ props.option.text }} </span></template>
                <template slot="noOptions" ><span>  No city selected </span></template>
                <template slot="noResult" ><span> No city found   </span></template>
            </multiselect>

            <div class="invalid-feedback c-err" v-if=" checkError('city') ">

                                         <span v-for="er in regError.city" >
                                            @{{ er }}
                                            </span>

            </div>



        </div>
        <div class="form-group mb-8">
            <div class="custom-control custom-checkbox form-check">
                <input type="checkbox" v-model="input.terms" class="custom-control-input form-check-input" id="check-term" :class="{ 'is-invalid':checkError('terms')}">
                <label class="custom-control-label text-dark select-none form-check-label" for="check-term">Yes, I agree
                    all Terms & Privacy Policy.</label>
                <div class="invalid-feedback c-err" v-if=" checkError('terms') ">

                                         <span v-for="er in regError.terms" >
                                            @{{ er }}
                                         </span>

                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block font-weight-bold text-uppercase font-size-lg rounded-sm">
            Create an
            account
        </button>
    </form>
</div>
