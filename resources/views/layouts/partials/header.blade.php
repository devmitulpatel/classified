<header id="header" class="main-header header-sticky header-sticky-smart header-style-01 header-float text-uppercase">
    <div class="header-wrapper sticky-area">
        <div class="container container-1720">
            <nav class="navbar navbar-expand-xl">
                <div class="header-mobile d-flex d-xl-none flex-fill justify-content-between align-items-center">
                    <div class="navbar-toggler toggle-icon" data-toggle="collapse" data-target="#navbar-main-menu">
                        <span></span>
                    </div>
                    <a class="navbar-brand navbar-brand-mobile" href="{{route('home')}}">
                        <img src="{{asset('images/logo.png')}}" alt="TheDir">
                    </a>
                    <a class="mobile-button-search" href="#search-popup" data-gtf-mfp="true" data-mfp-options='{"type":"inline","mainClass":"mfp-move-from-top mfp-align-top search-popup-bg","closeOnBgClick":false,"showCloseBtn":false}'><i class="far fa-search"></i></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-main-menu">
                    <a class="navbar-brand d-none d-xl-block mr-auto" href="{{route('home')}}">
                        <img src="{{asset('images/logo.png')}}" alt="TheDir">
                    </a>

                    @php
                        $allCategory=\App\Models\SubCategoryForAdmin::with(['parent_category'])->get();

                        $allCategory=$allCategory->groupBy('parent_category.name')->toArray();
                        $allCity=\App\Models\HighlightedCitiesForAdmin::all();

                    @endphp

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products & Services<span class="caret"><i class="fas fa-angle-down"></i></span></a>
                            <ul class="sub-menu x-animated x-fadeInUp">

                                @foreach($allCategory as $c=>$sc)
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">{{$c}}<span class="caret"><i class="fas fa-angle-down"></i></span></a>
                                        <ul class="sub-menu x-animated x-fadeInUp">
                                           @foreach($sc as $osc)
                                            <li class="nav-item"><a class="nav-link" href="blog-listing-grid.html">
                                                {{$osc['name']}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>

                                @endforeach

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">City <span class="caret"><i class="fas fa-angle-down"></i></span></a>
                            <ul class="sub-menu x-animated x-fadeInUp">
                              @foreach($allCity as $city)
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">{{$city->name}}</a>

                                    </li>
                                @endforeach


                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('aboutusForFrontEnd')}}">About us</a>
                        </li><li class="nav-item">
                            <a class="nav-link" href="{{route('contactusForFrontEnd')}}">Contact us</a>
                        </li>
                    </ul>
                    <div class="header-customize justify-content-end align-items-center d-none d-xl-flex">



                        <div class="header-customize-item" v-cloak :class="{'hide-custom':!sessionStarted}">

                            <a v-cloak v-on:click="openLoginModel" v-if="!userLoggedIn " href="#login-popup" class="link" data-gtf-mfp="true" data-mfp-options='{"type":"inline"}' >
                                <svg class="icon icon-user-circle-o">
                                    <use xlink:href="#icon-user-circle-o"></use>
                                </svg>
                                Log in</a>
                            <a v-cloak v-if="userLoggedIn " href="#login-popup" class="link" data-gtf-mfp="true" data-mfp-options='{"type":"inline"}'>
                                <svg class="icon icon-user-circle-o">
                                    <use xlink:href="#icon-user-circle-o"></use>
                                </svg>
                               My Profile</a>
                        </div>

                        <div class="header-customize-item flash animated infinite" v-cloak :class="{'hide-custom':sessionStarted}">

                            <span> <small class="text-muted">Fetching User info</small> <i class="fas fa-circle-notch fa-spin "></i></span>
                        </div>

                        @if((auth()->check() && (!auth()->user()->roles->contains(USER_ROLE) && auth()->user()->roles->contains(VENDOR_ROLE))) || !auth()->check() )
                        <div class="header-customize-item button">
                            <a href="{{route('add_list')}}" class="btn btn-primary btn-icon-right">Add
                                Listing
                                <i class="far fa-angle-right"></i></a>
                        </div>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>

