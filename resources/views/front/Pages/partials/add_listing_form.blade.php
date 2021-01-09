<div id="page-title" class="page-title pt-11 text-center">
    <div class="container">
        <div>
            <h1 class="mb-0 letter-spacing-50" data-animate="fadeInDown">
                Submit Your Products or Services
            </h1>
            <ul class="breadcrumb justify-content-center" data-animate="fadeInUp">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><span>Submit Your Listing</span></li>
            </ul>
        </div>

        <div class="page-description text-center font-size-md py-3 lh-15 mt-2 mb-2">
            <span class="font-weight-semibold text-dark">Returning User? Please </span>
            <span  class="text-link font-weight-semibold" href="#login-popup" data-gtf-mfp="true" data-mfp-options='{"type":"inline"}' >Sign In</span> and if you
            are a <span class="font-weight-semibold text-dark">New User, Continue Below</span> and register along with
            this submission.
        </div>

    </div>
</div>


<div id="wrapper-content" class="wrapper-content pb-13 pt-8">
    <div class="container ">

        <div id="submit-listing" class="section-submit-listing pb-2">
            <add-listing inline-template :sub-category="{{ \App\Models\SubCategoryForAdmin::all()->toJson() }}">
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
                                            <input type="text" class="form-control" placeholder="Staple & Fancy Hotel" v-model="form.name">
                                            <input type="text" class="form-control" placeholder="Tagline Example: Best Express Mexican Grill" v-model="form.tagline">
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="mb-2 d-flex align-items-center lh-15">
                                                <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15" for="city">City</label>
                                                <a href="#" class="text-darker-light d-inline-block ml-2" data-toggle="tooltip" data-placement="top" title="Region of listing">
                                                    <i class="fas fa-question-circle"></i></a></div>
                                            <input type="text" id="city" class="form-control" placeholder="Select your listing region" v-model="form.city">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="phone" class="text-dark font-weight-semibold font-size-md mb-2 lh-15">Phone</label>
                                            <input type="text" id="phone" class="form-control" placeholder="123-456-789"  v-model="form.contactno">
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="mb-2 d-flex align-items-center lh-15">
                                                <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15" for="address">Full Address
                                                    (Geolocation) </label>
                                                <a href="#" class="text-darker-light d-inline-block ml-2" data-toggle="tooltip" data-placement="top" title="Full address for finding in google map"><i class="fas fa-question-circle"></i></a></div>
                                            <input type="text" id="address" class="form-control" placeholder="Start typing and find your place in google map"  v-model="form.address">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="website" class="text-dark font-weight-semibold font-size-md mb-2 lh-15">Website</label>
                                            <input type="text" id="website" class="form-control" placeholder="http://"  v-model="form.website">
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

                                                <span class="col-4 col-md-3 " v-if="!t.closed &&!t.hr_24">@{{ t.open }} - @{{ t.close }}</span>
                                                <span class="col-4 col-md-3 text-danger" v-if="t.closed">Closed</span>
                                                <span class="col-4 col-md-3 " v-if="!t.closed &&t.hr_24">24 hrs</span>
                                                <div href="#" class="col-1 col-md-1 text-decoration-none btn btn-outline-danger btn-sm  " v-on:click="removeDay(t)"><i class="fal fa-times-circle"></i> </div>
                                            </div>

                                        </div>
                                        <div class="form-row align-items-center form-time" v-if="current_open_timing.length < 7">
                                            <div class="col item form-group day"  style="cursor: pointer">
                                                <select class="form-control" v-model="current_input_for_open_timing['day']">
                                                    <option  v-for="x in days" v-if="!current_open_timing.find(v=>{  return v.day==x })" :value="x">@{{ x }}</option>

                                                </select>
                                            </div>

                                            <div class="item form-checkbox" style="cursor: pointer" v-if="!current_input_for_open_timing.closed">
                                                <div class="custom-control custom-checkbox d-flex align-items-center">
                                                    <input class="custom-control-input" type="checkbox" id="hour" v-model="current_input_for_open_timing['hr_24']">
                                                    <label class="custom-control-label" for="hour">
                                                        24 Hours
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="item form-checkbox" style="cursor: pointer" v-if="!current_input_for_open_timing.hr_24">
                                                <div class="custom-control custom-checkbox d-flex align-items-center">
                                                    <input class="custom-control-input" type="checkbox" id="close" v-model="current_input_for_open_timing['closed']">
                                                    <label class="custom-control-label" for="close">
                                                       <span v-if="current_input_for_open_timing.closed">Stay </span>Close
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col item form-group" v-if="!current_input_for_open_timing.hr_24 && !current_input_for_open_timing.closed">
                                                <select class="form-control" v-model="current_input_for_open_timing['open']">
                                                    <option v-for="x in openTimings" :value="x.value">@{{ x.text }}</option>

                                                </select>
                                            </div>
                                            <div class="col item form-group" v-if="!current_input_for_open_timing.hr_24 && !current_input_for_open_timing.closed">
                                                <select class="form-control" v-model="current_input_for_open_timing['close']">
                                                    <option v-for="x in closeTimings" :value="x.value">@{{ x.text }}</option>
                                                </select>
                                            </div>

                                            <div class="col item">
                                                <div v-on:click="add_timings" href="#" class="btn btn-primary btn-add-new"><i class="fal fa-plus"></i></div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="category" class="text-dark font-weight-semibold font-size-md mb-2 lh-15">Category</label>
                                            <select id="category" class="form-control color-gray" v-model="form.category" v-on:change="updateSubCat">
                                                @php
                                                    $allCat=\App\Models\CategoriesForAdmin::all();
                                                @endphp
                                                @foreach($allCat as $cat)
                                                <option :value="{{$cat->toJson()}}">{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="sub-category" class="text-dark font-weight-semibold font-size-md mb-2 lh-15">Sub Category</label>
                                            <select id="sub-category" class="form-control color-gray" v-model="form.sub_category">

                                                <option v-for="sc in sub_cat" :value="sc" >@{{sc.name}}</option>

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

