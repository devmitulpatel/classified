@php

    $highlithedCity=\App\Models\HighlightedCitiesForAdmin::all();

    $highlithedCat=\App\Models\HighlightedCategory::with(['categories'])->get()->first();
    if($highlithedCat==null)  $highlithedCat=\App\Models\CategoriesForAdmin::all()->take(7);


@endphp

<div id="search-popup" class="mfp-hide">
    <div class="search-popup text-center">
        <h2 class="mb-8">Search</h2>
        <div class="form-search">
            <form>
                <div class="row align-items-end">
                    <div class="form-search-item col-md-7 mb-4 mb-md-0 text-left bg-white">
                        <label for="key-word-02"
                               class="pt-4 mb-0 text-dark font-weight-semibold font-size-lg lh-1">What</label>
                        <div class="input-group dropdown show pr-0 bg-transparent align-items-start">
                            <input type="text" autocomplete="off" id="key-word-02"
                                   class="form-control bg-transparent border-0 p-0 font-size-md lh-1"
                                   data-toggle="dropdown" aria-haspopup="true"
                                   placeholder="Ex: {{implode(', ',$highlithedCat->categories->pluck('name')->toArray() ?? $highlithedCat->pluck('name')->toArray())}}">
                            <button type="submit"
                                    class="btn text-dark btn-link input-group-append font-weight-normal p-0">
                                <i class="fal fa-search"></i>
                            </button>
                            <ul class="dropdown-menu form-search-ajax" aria-labelledby="key-word-02">
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
                    <div class="form-search-item col-md-5 mb-4 mb-md-0 text-left bg-white">
                        <label for="region-02"
                               class="pt-4 mb-0 text-dark font-weight-semibold font-size-lg lh-1">Where</label>
                        <div class="input-group dropdown show pr-0 bg-transparent align-items-start">
                            <input type="text" autocomplete="off" id="region-02"
                                   class="form-control bg-transparent border-0 p-0 font-size-md lh-1"
                                   data-toggle="dropdown" aria-haspopup="true" placeholder="{{$highlithedCity->first()->name}}">
                            <a href="#" class="input-group-append text-decoration-none" data-toggle="dropdown">
                                <i class="fal fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu form-search-ajax" aria-labelledby="region-02">
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
            </form>
        </div>
        <div class="heading mb-4">
            <div class="pt-8 font-size-lg mb-5">
                Or browse the highlights
            </div>
        </div>
        <div class="list-inline flex-wrap my-n2">


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
        <a href="#"
           class="d-inline-block button-close mt-11 pt-1 text-dark font-size-lg font-weight-semibold text-decoration-none">
            <span class="d-block"><i class="fal fa-times"></i></span>
            <span class="d-block">Close</span>
        </a>
    </div>
</div>
