<div id="wrapper-content" class="wrapper-content pt-0 pb-13">
    <div id="map" class="map" style="width:100%;height:645px;"></div>
    <div class="container">
        <div class="pt-12">
            <div class="heading text-center mb-10">
                <h3 class="mb-0 lh-12">Contact us for any further questions, possible projects
                    and business partnerships</h3>
            </div>
            <div class="row mb-10">
                <div class="col-md-4 mb-5 mb-md-0">
                    <div class="text-center">
                        <h5 class="font-weight-normal text-uppercase mb-5">Contact Directly</h5>
                        <div class="d-flex flex-column">
                            @php
                     // dd(config('default_var'));
                            @endphp
                            <span>{{config('default_var.website_official_sales_email')}}</span>
                            <span>{{config('default_var.website_official_support_no')}}</span>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5 mb-md-0">
                    <div class="text-center">
                        <h5 class="font-weight-normal text-uppercase mb-5">Visit our office</h5>
                        <div class="d-flex flex-column">
                            <span>{{ implode(', ',[config('default_var.website_official_address_line_1'),config('default_var.website_official_address_line_2'),])  }},</span>
                            <span>{{ implode(', ',[config('default_var.website_official_address_line_3'),config('default_var.website_official_city')])  }}  </span>
                            <span>{{ implode(', ',[config('default_var.website_official_state'),config('default_var.website_official_address_country')])  }}-{{config('default_var.website_official_pincode')}}  </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info-item text-center">
                        <h5 class="font-weight-normal text-uppercase mb-5">work with us</h5>
                        <div class="d-flex flex-column">
                            <span>Send your CV to our email:</span>
                            <span>{{config('default_var.website_official_support_email')}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-contact">
            <div class="form-wrapper px-3 px-sm-12 pt-11 pb-12">
                <h3 class="mb-9 text-center">Get In Touch</h3>
                <form>
                    <div class="row mb-4">
                        <div class="form-group col-md-4">
                            <label for="name" class="sr-only">Name</label>
                            <input type="text" class="form-control bg-transparent text-dark rounded-0 pl-0 font-size-md" placeholder="Name" id="name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email" class="sr-only">Name</label>
                            <input type="email" class="form-control bg-transparent text-dark rounded-0 pl-0 font-size-md" placeholder="Email Address" id="email">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="subject" class="sr-only">Name</label>
                            <input type="text" class="form-control bg-transparent text-dark rounded-0 pl-0 font-size-md" placeholder="Subjects" id="subject">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="text-dark font-size-md">
                            Message
                        </label>
                        <textarea class="form-control bg-transparent text-dark rounded-0 pl-0" id="message"></textarea>
                    </div>
                    <div class="text-center pt-10">
                        <button class="btn btn-link text-decoration-underline text-dark text-uppercase font-size-md font-weight-semibold text-decoration-underline" type="button">post comment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


