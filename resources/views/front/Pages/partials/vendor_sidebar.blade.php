<div class="sidebar">

    @php

    if(auth()->check())$user=auth()->user()->toArray();
  //  dd($user);
    @endphp
    @isset($user)
        <div class="container-fluid">
            <div class="user-profile media align-items-center mb-6">
                <div class="image mr-3"><img src="{{asset('images/other/account-campaign.png')}}" alt="User image" class="rounded-circle"></div>
                <div class="media-body lh-14">
                    <span class="text-dark d-block font-size-md">Hello,</span>
                    <span class="mb-0 h5">{{$user['name']}}!</span>
                </div>
            </div>
            <ul class="list-group list-group-flush list-group-borderless">
                <li class="list-group-item p-0 mb-2 lh-15">
                    <a href="{{route('user_dashboard')}}" class="d-flex align-items-center link-hover-dark-primary font-size-md">
                        <span class="d-inline-block mr-3"><i class="fal fa-cog"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="list-group-item p-0 mb-2 lh-15">
                    <a href="#listing" class="d-flex align-items-center link-hover-dark-primary font-size-md" data-toggle="collapse" aria-expanded="false">
                        <span class="d-inline-block mr-3"><i class="fal fa-bookmark"></i></span>
                        <span>Listing</span>
                        <span class=" ml-auto"><i class="fal fa-chevron-down"></i></span>
                    </a>
                    <ul class="submenu collapse list-group list-group-flush list-group-borderless pt-2 mb-0 sidebar-menu" id="listing">
                        <li class="list-group-item p-0 mb-2 lh-15"><a href="panel-my-listing.html" class="link-hover-dark-primary font-size-md">Products</a></li>
                        <li class="list-group-item p-0 mb-2 lh-15"><a href="panel-my-listing.html" class="link-hover-dark-primary font-size-md">Services</a></li>
                    </ul>
                </li>
                <li class="list-group-item p-0 mb-2 lh-15">
                    <a href="#listing2" class="d-flex align-items-center link-hover-dark-primary font-size-md" data-toggle="collapse" aria-expanded="false">
                        <span class="d-inline-block mr-3"><i class="fal fa-bookmark"></i></span>
                        <span>Premium Listing</span>
                        <span class=" ml-auto"><i class="fal fa-chevron-down"></i></span>
                    </a>
                    <ul class="submenu collapse list-group list-group-flush list-group-borderless pt-2 mb-0 sidebar-menu" id="listing2">
                        <li class="list-group-item p-0 mb-2 lh-15"><a href="panel-my-listing.html" class="link-hover-dark-primary font-size-md">Products</a></li>
                        <li class="list-group-item p-0 mb-2 lh-15"><a href="panel-my-listing.html" class="link-hover-dark-primary font-size-md">Services</a></li>
                    </ul>
                </li>
                <li class="list-group-item p-0 mb-2 lh-15">
                    <a href="panel-my-favourite.html" class="d-flex align-items-center link-hover-dark-primary font-size-md">
                        <span class="d-inline-block mr-3"><i class="fal fa-bookmark"></i></span>
                        <span>Invoices</span>
                    </a>
                </li>
 <li class="list-group-item p-0 mb-2 lh-15">
                    <a href="panel-my-favourite.html" class="d-flex align-items-center link-hover-dark-primary font-size-md">
                        <span class="d-inline-block mr-3"><i class="fal fa-bookmark"></i></span>
                        <span>Message Box</span>
                    </a>
                </li>

                <li class="list-group-item p-0 mb-2 lh-15">
                    <a href="{{route('user_profile')}}" class="d-flex align-items-center link-hover-dark-primary font-size-md">
                        <span class="d-inline-block mr-3"><svg class="icon icon-user"><use xlink:href="#icon-user"></use></svg></span>
                        <span>My Profile</span>
                    </a>
                </li>
                <li class="list-group-item p-0 mb-2 lh-15" v-on:click="signOutUser" >
                    <a   href="#" class="d-flex align-items-center link-hover-dark-primary font-size-md">
                        <span class="d-inline-block mr-3"><svg class="icon icon-exit"><use xlink:href="#icon-exit"></use></svg></span>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>

    @endisset

</div>
