@php

    $highlithedCity=\App\Models\HighlightedCitiesForAdmin::all();

    $highlithedCat=\App\Models\HighlightedCategory::with(['categories'])->get()->first();
    if($highlithedCat==null)  $highlithedCat=\App\Models\CategoriesForAdmin::all()->take(7);
    //dd($highlithedCat);

@endphp

<header id="header" class="main-header header-sticky header-sticky-smart header-style-10 text-uppercase bg-white">
    <div class="header-wrapper sticky-area border-bottom">
        <div class="container-fluid">
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
                    <a class="navbar-brand d-none d-xl-block" href="{{route('home')}}">
                        <img src="{{asset('images/logo.png')}}" alt="TheDir">
                    </a>
                    <div class="form-search form-search-style-04 d-flex mr-auto">
                        <form>
                            <div class="d-flex align-items-center">
                                <div class="form-search-items d-flex">
                                    <div class="form-search-item d-flex align-items-center what border-right">
                                        <label for="key-word">What</label>
                                        <div class="input-group dropdown show bg-transparent">
                                            <input type="text" autocomplete="off" id="key-word" name="key-word" class="form-control bg-transparent border-0" placeholder="Ex: {{implode(', ',$highlithedCat->categories->pluck('name')->toArray() ?? $highlithedCat->pluck('name')->toArray())}}" data-toggle="dropdown" aria-haspopup="true">
                                            <a href="#" class="input-group-append text-decoration-none" data-toggle="dropdown">
                                                <i class="fal fa-chevron-down"></i>
                                            </a>
                                            <ul class="dropdown-menu form-search-ajax" aria-labelledby="key-word">
                                                @foreach($highlithedCat->categories as $cat)
                                                <li class="dropdown-item item">
                                                    <a href="#" class="link-hover-dark-white">
                                                        <svg class="icon {{$cat->icon}}">
                                                            <use xlink:href="#{{$cat->icon}}"></use>
                                                        </svg>
                                                        <span class="font-size-md">{{ucwords($cat->name)}}</span>
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form-search-item d-flex align-items-center where">
                                        <label for="region">Where</label>
                                        <div class="input-group dropdown show bg-transparent">
                                            <input type="text" autocomplete="off" id="region" name="region" class="form-control bg-transparent border-0" placeholder="{{ucwords($highlithedCity->first()->name)}}" data-toggle="dropdown" aria-haspopup="true">
                                            <a href="#" class="input-group-append text-decoration-none" data-toggle="dropdown">
                                                <i class="fal fa-chevron-down"></i>
                                            </a>
                                            <ul class="dropdown-menu form-search-ajax" aria-labelledby="region">
                                                @foreach($highlithedCity as $city)
                                                <li class="dropdown-item item">
                                                    <a href="#" class="link-hover-dark-white">
                                                        {{$city->name}}
                                                    </a>
                                                </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fal fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Explore<span class="caret"><i class="fas fa-angle-down"></i></span></a>
                            <ul class="sub-menu x-animated x-fadeInUp">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"> layout
                                        <span class="caret"><i class="fas fa-angle-down"></i></span>
                                    </a>
                                    <ul class="sub-menu x-animated x-fadeInUp">
                                        <li class="nav-item"><a class="nav-link" href="explore-full-map-grid.html"> full
                                                map grid</a></li>
                                        <li class="nav-item"><a class="nav-link" href="explore-full-map-list.html"> full
                                                map list</a></li>
                                        <li class="nav-item"><a class="nav-link" href="explore-half-map-grid.html"> half
                                                map grid</a></li>
                                        <li class="nav-item"><a class="nav-link" href="explore-half-map-list.html"> half
                                                map list</a></li>
                                        <li class="nav-item"><a class="nav-link" href="explore-sidebar-grid.html"> sidebar
                                                grid</a></li>
                                        <li class="nav-item"><a class="nav-link" href="explore-sidebar-list.html"> sidebar
                                                list</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Listing details
                                        <span class="caret"><i class="fas fa-angle-down"></i></span>
                                    </a>
                                    <ul class="sub-menu x-animated x-fadeInUp">
                                        <li class="nav-item"><a class="nav-link" href="listing-details-full-gallery.html">
                                                full gallery</a></li>
                                        <li class="nav-item"><a class="nav-link" href="listing-details-full-image.html">
                                                full image</a></li>
                                        <li class="nav-item"><a class="nav-link" href="listing-details-full-map.html">
                                                full map</a></li>
                                        <li class="nav-item"><a class="nav-link" href="listing-details-gallery.html">gallery</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="listing-details-image.html"> image</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="listing-details-no-image.html"> no
                                                image</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Blog <span class="caret"><i class="fas fa-angle-down"></i></span></a>
                            <ul class="sub-menu x-animated x-fadeInUp">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Blog layout<span class="caret"><i class="fas fa-angle-down"></i></span></a>
                                    <ul class="sub-menu x-animated x-fadeInUp">
                                        <li class="nav-item"><a class="nav-link" href="blog-listing-grid.html">
                                                grid</a></li>
                                        <li class="nav-item"><a class="nav-link" href="blog-listing-large-image.html">
                                                large image</a></li>
                                        <li class="nav-item"><a class="nav-link" href="blog-listing-with-sidebar.html">
                                                with sidebar</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Post
                                        <span class="caret"><i class="fas fa-angle-down"></i></span>
                                    </a>
                                    <ul class="sub-menu x-animated x-fadeInUp">
                                        <li class="nav-item"><a class="nav-link" href="blog-single-audio.html">
                                                audio</a></li>
                                        <li class="nav-item"><a class="nav-link" href="blog-single-gallery.html">
                                                gallery</a></li>
                                        <li class="nav-item"><a class="nav-link" href="blog-single-image.html">
                                                image</a></li>
                                        <li class="nav-item"><a class="nav-link" href="blog-single-video.html">video</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Docs <span class="caret"><i class="fas fa-angle-down"></i></span></a>
                            <ul class="sub-menu x-animated x-fadeInUp">
                                <li class="nav-item">
                                    <a class="nav-link" href="document/introduction.html">Documentation</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="starter/introduction.html">Get started
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="header-customize justify-content-end align-items-center d-none d-xl-flex">
                        <div class="header-customize-item button-search">
                            <a class="mobile-button-search" href="#search-popup" data-gtf-mfp="true" data-mfp-options='{"type":"inline","mainClass":"mfp-move-from-top mfp-align-top search-popup-bg","closeOnBgClick":false,"showCloseBtn":false}'><i class="far fa-search"></i></a>
                        </div>
                        <div class="header-customize-item" v-cloak :class="{'hide-custom':!sessionStarted}">
                            <a v-cloak v-if="!userLoggedIn"  href="#login-popup" ref="loginBtn" class="link" data-gtf-mfp="true" data-mfp-options='{"type":"inline"}'>
                                <svg class="icon icon-user-circle-o">
                                    <use xlink:href="#icon-user-circle-o"></use>
                                </svg>
                                Log in</a>

                            <a v-cloak v-if="userLoggedIn"  href="#login-popup" class="link" data-gtf-mfp="true" data-mfp-options='{"type":"inline"}'>
                                <svg class="icon icon-user-circle-o">
                                    <use xlink:href="#icon-user-circle-o"></use>
                                </svg>
                                My Profile</a>



                        </div>


                        <div class="header-customize-item flash animated infinite" v-cloak :class="{'hide-custom':sessionStarted}">

                            <span> <small class="text-muted">Fetching User info</small> <i class="fas fa-circle-notch fa-spin "></i></span>
                        </div>

                        <div class="header-customize-item">
                            @if(request()->route()->getName()!="add_list")
                            <a href="{{route('add_list')}}" class="btn btn-primary btn-icon-right" >Add
                                Listing <i class="far fa-angle-right"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
