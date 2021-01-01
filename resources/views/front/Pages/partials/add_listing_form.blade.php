<div id="page-title" class="page-title pt-11 text-center">
    <div class="container-fluid">
        <div>
            <h1 class="mb-0 letter-spacing-50" data-animate="fadeInDown">
                Submit Your Products or Services
            </h1>
            <ul class="breadcrumb justify-content-center" data-animate="fadeInUp">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><span>Submit Your Listing</span></li>
            </ul>
        </div>
    </div>
</div>


<div id="wrapper-content" class="wrapper-content pb-13 pt-8">
    <div class="container-fluid ">
        <div class="page-description text-center font-size-md py-3 lh-15 mb-9">
            <span class="font-weight-semibold text-dark">Returning User? Please </span>
            <span  class="text-link font-weight-semibold" href="#login-popup" data-gtf-mfp="true" data-mfp-options='{"type":"inline"}' >Sign In</span> and if you
            are a <span class="font-weight-semibold text-dark">New User, Continue Below</span> and register along with
            this submission.
        </div>

        <div id="submit-listing" class="section-submit-listing pb-2">
            <add-listing inline-template>
                <div>
                    <div class="submit-listing-blocks mb-9 border-bottom pb-6">
                        <div class="row lh-18">
                            <div class="col-md-6 ">
                                <div class="card border-0 p-0">
                                    <img src="images/other/submit-listing-1.jpg" alt="Submit listing 01" class="card-img-top">
                                    <div class="card-body px-0 pt-6">
                                        <div class="form-group mb-4">
                                            <div class="text-dark font-weight-semibold font-size-md mb-2 lh-15">Listing Tittle
                                                <a href="#" class="text-darker-light d-inline-block ml-2" data-toggle="tooltip" data-placement="top" title="Title for listing"><i class="fas fa-question-circle"></i></a>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Staple & Fancy Hotel">
                                            <input type="text" class="form-control" placeholder="Tagline Example: Best Express Mexican Grill">
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="mb-2 d-flex align-items-center lh-15">
                                                <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15" for="city">City</label>
                                                <a href="#" class="text-darker-light d-inline-block ml-2" data-toggle="tooltip" data-placement="top" title="Region of listing">
                                                    <i class="fas fa-question-circle"></i></a></div>
                                            <input type="text" id="city" class="form-control" placeholder="Select your listing region">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="phone" class="text-dark font-weight-semibold font-size-md mb-2 lh-15">Phone</label>
                                            <input type="text" id="phone" class="form-control" placeholder="123-456-789">
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="mb-2 d-flex align-items-center lh-15">
                                                <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15" for="address">Full Address
                                                    (Geolocation) </label>
                                                <a href="#" class="text-darker-light d-inline-block ml-2" data-toggle="tooltip" data-placement="top" title="Full address for finding in google map"><i class="fas fa-question-circle"></i></a></div>
                                            <input type="text" id="address" class="form-control" placeholder="Start typing and find your place in google map">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="website" class="text-dark font-weight-semibold font-size-md mb-2 lh-15">Website</label>
                                            <input type="text" id="website" class="form-control" placeholder="http://">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="card border-0 p-0">
                                    <img src="images/other/submit-listing-2.jpg" alt="Submit listing 02" class="card-img-top">
                                    <div class="card-body px-0 pt-6">
                                        <div class="form-group business-hours mb-2">
                                            <div class="text-dark font-weight-semibold font-size-md mb-3 lh-12">Add Business Hours
                                            </div>
                                            <div class="row lh-18 mb-2" v-for="t in  current_open_timing">
                                                <span class="font-weight-semibold col-4 col-md-3">@{{ t.day }}</span>
                                                <span class="col-4 col-md-3 " v-if="!t.hr_24">@{{ t.open }} - @{{ t.close }}</span>
                                                <span class="col-4 col-md-3 " v-if="t.hr_24">24 hrs</span>
                                                <a href="#" class="col-1 col-md-1 text-decoration-none badge badge-danger badge-pill  ">x Remove </a>
                                            </div>

                                        </div>
                                        <div class="form-row align-items-center form-time">
                                            <div class="col item form-group day">
                                                <select class="form-control" v-model="current_input_for_open_timing['day']">
                                                    <option  v-for="x in days" :value="x">@{{ x }}</option>

                                                </select>
                                            </div>
                                            <div class="col item form-group">
                                                <select class="form-control" v-model="current_input_for_open_timing['open']">
                                                    <option v-for="x in openTimings" :value="x.value">@{{ x.text }}</option>

                                                </select>
                                            </div>
                                            <div class="col item form-group">
                                                <select class="form-control" v-model="current_input_for_open_timing['close']">
                                                    <option v-for="x in closeTimings" :value="x.value">@{{ x.text }}</option>
                                                </select>
                                            </div>
                                            <div class="item form-checkbox">
                                                <div class="custom-control custom-checkbox d-flex align-items-center">
                                                    <input class="custom-control-input" type="checkbox" id="hour" v-model="current_input_for_open_timing['hr_24']">
                                                    <label class="custom-control-label" for="hour">
                                                        24 Hours
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col item">
                                                <div v-on:click="add_timings" href="#" class="btn btn-primary btn-add-new"><i class="fal fa-plus"></i></div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="category" class="text-dark font-weight-semibold font-size-md mb-2 lh-15">Category</label>
                                            <select id="category" class="form-control color-gray">
                                                <option selected>Choose your business category</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="price-status" class="text-dark font-weight-semibold font-size-md mb-2 lh-15">Price Status</label>
                                            <select id="price-status" class="form-control color-gray">
                                                <option>Not to say</option>
                                            </select>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="col">
                                                <label for="price-form" class="text-dark font-weight-semibold font-size-md mb-2 lh-15">Price From</label>
                                                <select id="price-form" class="form-control color-gray">
                                                    <option>$0.00</option>
                                                    <option>$10.00</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label class="text-dark font-weight-semibold font-size-md mb-2 lh-15" for="price-to">Price To</label>
                                                <select id="price-to" class="form-control color-gray">
                                                    <option>$0.00</option>
                                                    <option>$10.00</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-listing-blocks mb-6">
                        <div class="row lh-18">
                            <div class="col-md-6 submit-listing-block">
                                <div class="card border-0 p-0">
                                    <img src="images/other/submit-listing-3.jpg" alt="Submit listing 02" class="card-img-top">
                                    <div class="card-body px-0 pt-6">
                                        <div class="form-group mb-4">
                                            <label class="text-dark font-weight-semibold font-size-md mb-2 lh-15" for="description">Description
                                            </label>
                                            <editor
                                                api-key="vn59v24mvmfu9qsfu4b3dzb6uvq7n1yscjrm7ge1jo3lerd4"
                                                initialValue="<p>Initial editor content</p>"
                                                :init="{
                                              media_live_embeds: true,
                                              branding: false,
                                              menubar: false,
                                              plugins: 'advcode casechange linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable  tinymcespellchecker image ',
                                              toolbar: ['casechange checklist | undo redo | table image media pageembed permanentpen code',
                                              ' cut copy paste |bold italic underline strikethrough superscript subscript | formats | removeformat'],

                                              toolbar_mode: 'floating',
                                              file_browser_callback_types: 'file image media',
                                              file_browser_callback:(field_name, url, type, win)=>file_browsercallback(field_name, url, type, win),
                                              images_upload_url: 'upload/listing/files',
                                              automatic_uploads: true,
                                              images_upload_credentials: true,

                                            }"

                                            >
                                            </editor>

                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="text-dark font-weight-semibold font-size-md mb-2 lh-15">Social</label>
                                            <div class="row mb-4">
                                                <div class="col-md-6 mb-4 mb-md-0">
                                                    <input type="text" class="form-control" placeholder="Your Twitter URL">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Your Facebook URL">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-md-6 mb-4 mb-md-0">
                                                    <input type="text" class="form-control" placeholder="Your Linkedln URL">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Your Google Plus URL">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-md-6 mb-4 mb-md-0">
                                                    <input type="text" class="form-control" placeholder="Your Youtube URL">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Your Instagram URL">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="mb-2 d-flex align-items-center lh-15">
                                                <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15" for="tags">Tags or keywords (Comma
                                                    seprated)</label>
                                                <a href="#" class="text-darker-light d-inline-block ml-2" data-toggle="tooltip" data-placement="top" title="Tags or keyword for search easier"><i class="fas fa-question-circle"></i></a>
                                            </div>
                                            <textarea id="tags" class="form-control" placeholder="Enter tags or keywords comma sperated..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 submit-listing-block">
                                <div class="card border-0 p-0">
                                    <img src="images/other/submit-listing-4.jpg" alt="Submit listing 04" class="card-img-top">
                                    <div class="card-body px-0 pt-6">
                                        <div class="form-group mb-4">
                                            <label class="text-dark font-weight-semibold font-size-md mb-2 lh-15" for="video">Your Business Video
                                            </label>
                                            <input type="text" id="video" class="form-control" placeholder="ex: https://youtube.com/ssgfse249Klf">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="text-dark font-weight-semibold font-size-md mb-2 lh-15">Images
                                            </label>
                                            @include('layouts.partials.uploader' , [ 'collection'=>'images','model'=>\App\Models\ProductForVendor::class,'rootUpdateFunction'=>'updateFormFromImageCollection' ] )
                                            <div class="mt-3">The first image will be shown on listing
                                                cards.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-8 border-top">
                        <div class="contact-section text-center pt-3">
                            <div class="form-group mb-5">
                                <label for="email" class="font-weight-semibold text-dark font-size-md">Enter email to signup & recieve
                                    notification upon
                                    listing
                                    approval</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your contact email">
                            </div>
                            <div class="d-flex justify-content-center pb-8">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="have-account">
                                    <label class="custom-control-label mb-0" for="have-account">
                                        Already Have Account?
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-block font-size-h5 lh-19 mt-2">Save & Preview</button>
                        </div>
                    </div>
                </div>
            </add-listing>


        </div>

    </div>
</div>

