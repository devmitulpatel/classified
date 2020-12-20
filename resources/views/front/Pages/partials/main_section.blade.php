@php

$highlithedCity=\App\Models\HighlightedCitiesForAdmin::all();

$highlithedCat=\App\Models\HighlightedCategory::with(['categories'])->get()->first();
if($highlithedCat==null)  $highlithedCat=\App\Models\CategoriesForAdmin::all()->take(7);
//dd($highlithedCat);

@endphp


<section id="section-01" class="home-main-intro">
    <div class="home-main-intro-container">
        <div class="container">
            <div class="heading mb-9">
                <h1 class="mb-7">
                    <span class="d-block" data-animate="slideInLeft">Discover</span>
                    <span class="font-weight-light d-block" data-animate="fadeInRight">your amazing city</span>
                </h1>
                <p class="h5 font-weight-normal text-secondary mb-0" data-animate="fadeInDown">
                    Find great places to stay, eat, shop, or visit from local experts.
                </p>
            </div>
            <div class="form-search form-search-style-02 pb-9" data-animate="fadeInDown">
                <form>
                    <div class="row align-items-end no-gutters">
                        <div class="col-xl-6 mb-4 mb-xl-0 py-3 px-4 bg-white border-right position-relative rounded-left form-search-item">
                            <label for="key-word" class="font-size-md font-weight-semibold text-dark mb-0 lh-1">What</label>
                            <div class="input-group dropdown ">
                                <input type="text" autocomplete="off" id="key-word" name="key-word" class="form-control form-control-mini border-0 px-0 bg-transparent" placeholder="Ex: {{implode(', ',$highlithedCat->categories->pluck('name')->toArray() ?? $highlithedCat->pluck('name')->toArray())}}" data-toggle="dropdown" aria-haspopup="true">
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
                        <div class="col-xl-4 mb-4 mb-xl-0 py-3 px-4 bg-white position-relative rounded-right form-search-item">
                            <label for="key-word" class="font-size-md font-weight-semibold text-dark mb-0 lh-1">Where</label>
                            <div class="input-group dropdown ">
                                <input type="text" autocomplete="off" id="region" name="region" class="form-control form-control-mini border-0 px-0 bg-transparent" placeholder="{{$highlithedCity->first()->name}}" data-toggle="dropdown" aria-haspopup="true">
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
                        <div class="col-xl-2 button">
                            <button type="submit" class="btn btn-primary btn-lg btn-icon-left btn-block"><i class="fal fa-search"></i>Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="font-size-lg mb-4">
                Or browse the highlights
            </div>
            <div class="list-inline pb-8 flex-wrap my-n2">


                @foreach($highlithedCat->categories as $cat)
                <div class="list-inline-item py-2">
                    <a href="explore-sidebar-grid.html" class="card border-0 icon-box-style-01 link-hover-dark-white">
                        <div class="card-body p-0">
                            <svg class="icon {{$cat['icon']}}">
                                <use xlink:href="#{{$cat['icon']}}"></use>
                            </svg>
                            <span class="card-text font-size-md font-weight-semibold mt-2 d-block">
                            {{ucwords($cat->name)}}
                            </span>
                        </div>
                    </a>
                </div>
                @endforeach



            </div>
        </div>
        <div class="home-main-how-it-work bg-white pt-11">
            <div class="container">
                <h2 class="mb-8">
                    <span>See</span>
                    <span class="font-weight-light">How It Works</span>
                </h2>
                <div class="row no-gutters pb-11">
                    <div class="col-lg-4 mb-4 mb-lg-0 px-0 px-lg-4">
                        <div class="media icon-box-style-02" data-animate="fadeInDown">
                            <div class="d-flex flex-column align-items-center mr-6">
                                <svg class="icon icon-checkmark-circle">
                                    <use xlink:href="#icon-checkmark-circle"></use>
                                </svg>
                                <span class="number h1 font-weight-bold">1</span>
                            </div>
                            <div class="media-body lh-14">
                                <h5 class="mb-3 lh-1">
                                    Choose What To Do
                                </h5>
                                <p class="font-size-md text-gray mb-0 text-muted">
                                    Looking for a cozy hotel to stay, a restaurant to eat, a museum to visit
                                    or a mall to do some shopping?
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-0 px-0 px-lg-4">
                        <div class="media icon-box-style-02" data-animate="fadeInDown">
                            <div class="d-flex flex-column align-items-center mr-6">
                                <svg class="icon icon-checkmark-circle">
                                    <use xlink:href="#icon-checkmark-circle"></use>
                                </svg>
                                <span class="number h1 font-weight-bold">2</span>
                            </div>
                            <div class="media-body lh-14">
                                <h5 class="mb-3 lh-1">
                                    Find What You Want
                                </h5>
                                <p class="font-size-md text-gray mb-0 text-muted">
                                    Search and filter hundreds of listings, read reviews, explore photos and
                                    find the perfect spot.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-0 px-0 px-lg-4">
                        <div class="media icon-box-style-02" data-animate="fadeInDown">
                            <div class="d-flex flex-column align-items-center mr-6">
                                <svg class="icon icon-checkmark-circle">
                                    <use xlink:href="#icon-checkmark-circle"></use>
                                </svg>
                                <span class="number h1 font-weight-bold">3</span>
                            </div>
                            <div class="media-body lh-14">
                                <h5 class="mb-3 lh-1">
                                    Explore Amazing Places
                                </h5>
                                <p class="font-size-md text-gray mb-0 text-muted">
                                    Go and have a good time or even make a booking directly from the listing
                                    page. All of those, thanks to TheDir!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-bottom"></div>
            </div>
        </div>
    </div>
</section>
