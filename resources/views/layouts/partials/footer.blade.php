
<footer class="main-footer main-footer-style-01 bg-pattern-01 pt-12 pb-8">
    <div class="footer-second">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-4 mb-6 mb-lg-0">
                    <div class="mb-8"><img src="{{asset('images/logo.png')}}" alt="Thedir"></div>
                    <div class="mb-7">
                        <div class="font-size-md font-weight-semibold text-dark mb-4">Global Headquaters</div>
                        <p class="mb-0">

                            <span>{{ implode(', ',[config('default_var.website_official_address_line_1'),config('default_var.website_official_address_line_2'),])  }},</span><br>
                            <span>{{ implode(', ',[config('default_var.website_official_address_line_3'),config('default_var.website_official_city')])  }}  </span><br>
                            <span>{{ implode(', ',[config('default_var.website_official_state'),config('default_var.website_official_address_country')])  }}-{{config('default_var.website_official_pincode')}}  </span>


                    </div>
{{--                    <div class="region pt-1">--}}
{{--                        <div class="font-size-md font-weight-semibold text-dark mb-2">Recent Region</div>--}}
{{--                        <form>--}}
{{--                            <div class="select-custom bg-white">--}}
{{--                                <select class="form-control bg-transparent">--}}
{{--                                    <option value="1">San Fracisco, CA</option>--}}
{{--                                    <option value="1">New York</option>--}}
{{--                                    <option value="1">LA</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
                </div>
                <div class="col-md-6 col-lg mb-6 mb-lg-0">
                    <div class="font-size-md font-weight-semibold text-dark mb-4">
                        Company
                    </div>
                    <ul class="list-group list-group-flush list-group-borderless">
                        <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                            <a href="{{route('aboutusForFrontEnd')}}" class="link-hover-secondary-primary">About Us</a>
                        </li>
                        <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                            <a href="#" class="link-hover-secondary-primary">Team</a>
                        </li>
                        <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                            <a href="#" class="link-hover-secondary-primary">Careers</a>
                        </li>
                        <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                            <a href="#" class="link-hover-secondary-primary">Investors</a>
                        </li>
                        <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                            <a href="{{route('contactusForFrontEnd')}}" class="link-hover-secondary-primary">Contact Us</a>
                        </li>
                        <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                            <a href="#" class="link-hover-secondary-primary">Offices</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg mb-6 mb-lg-0">
                    <div class="font-size-md font-weight-semibold text-dark mb-4">
                        Quick Links
                    </div>
                    <ul class="list-group list-group-flush list-group-borderless">
                        <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                            <a href="page-faqs.html" class="link-hover-secondary-primary">FAQS</a>
                        </li>
                        <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                            <a href="#" class="link-hover-secondary-primary">Support</a>
                        </li>
                        <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                            <a href="#" class="link-hover-secondary-primary">Sitemap</a>
                        </li>
                        <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                            <a href="#" class="link-hover-secondary-primary">Community</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-4 mb-6 mb-lg-0">
                    <div class="pl-0 pl-lg-9">
                        <div class="font-size-md font-weight-semibold text-dark mb-4">Our Newsletter</div>
                        <div class="mb-4">Subscribe to our newsletter and<br>
                            we will inform you about newset directory and promotions
                        </div>
                        <div class="form-newsletter">
                            <form>
                                <div class="input-group bg-white">
                                    <input type="text" class="form-control border-0" placeholder="Email Address... ">
                                    <button type="button" class="input-group-append btn btn-white bg-transparent text-dark border-0">
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-last mt-8 mt-md-11">
        <div class="container">
            <div class="footer-last-container position-relative">
                <div class="row align-items-center">
                    <div class="col-lg-4 mb-3 mb-lg-0">
                        <div class="social-icon text-dark">
                            <ul class="list-inline">


                                @php
                                $debug=true;
                                @endphp

                                @if (config('default.website_social_twitter')=="#" || $debug)
                                        <li class="list-inline-item mr-5">
                                            <a target="_blank" title="Twitter" href="{{config('default.website_social_twitter')}}">
                                                <i class="fab fa-twitter">
                                                </i>
                                                <span>Twitter</span>
                                            </a>
                                        </li>
                                @endif
                                @if (config('default.website_social_facebook')=="#" || $debug)
                                <li class="list-inline-item mr-5">
                                    <a target="_blank" title="Facebook" href="{{config('default.website_social_facebook')}}">
                                        <i class="fab fa-facebook-f">
                                        </i>
                                        <span>Facebook</span>
                                    </a>
                                </li>
                                @endif
                                @if (config('default.website_social_google_plus')=="#" || $debug)
                                <li class="list-inline-item mr-5">
                                    <a target="_blank" title="Google plus" href="{{config('default.website_social_google_plus')}}">
                                        <svg class="icon icon-google-plus-symbol">
                                            <use xlink:href="#icon-google-plus-symbol"></use>
                                        </svg>
                                        <span>Google plus</span>
                                    </a>
                                </li>
                                @endif
                                @if (config('default.website_social_instagram')=="#" || $debug)
                                <li class="list-inline-item mr-5">
                                    <a target="_blank" title="Instagram" href="{{config('default.website_social_instagram')}}">
                                        <svg class="icon icon-instagram">
                                            <use xlink:href="#icon-instagram"></use>
                                        </svg>
                                        <span>Instagram</span>
                                    </a>
                                </li>
                                @endif
                                @if (config('default.website_social_rss')=="#" || $debug)
                                <li class="list-inline-item mr-5">
                                    <a target="_blank" title="Rss" href="{{config('default.website_social_rss')}}">
                                        <i class="fas fa-rss"></i>
                                        <span>Rss</span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 mb-3 mb-lg-0">
                        <div>
                            &copy; 2020 <a href="{{route('home')}}" class="link-hover-dark-primary font-weight-semibold">{{config('default_var.website_company_name')}}.</a> All
                            Rights Resevered. <br>
                            <small class="text-center text-muted">Design
                                by <a href="http://millionsllp.com/" class="link-hover-dark-primary font-weight-semibold">Million Solutions LLP</a></small>
                        </div>
                    </div>
                    <div class="back-top text-left text-lg-right gtf-back-to-top">
                        <a href="#" class="link-hover-secondary-primary"><i class="fal fa-arrow-up"></i><span>Back To Top</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
