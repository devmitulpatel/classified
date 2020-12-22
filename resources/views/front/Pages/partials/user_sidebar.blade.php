<div class="sidebar">
    <div class="container-fluid">
        <div class="user-profile media align-items-center mb-6">
            <div class="image mr-3"><img src="{{asset('images/other/account-campaign.png')}}" alt="User image" class="rounded-circle"></div>
            <div class="media-body lh-14">
                <span class="text-dark d-block font-size-md">Howdy,</span>
                <span class="mb-0 h5">Logan Cee!</span>
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
                    <span class="d-inline-block mr-3"><svg class="icon icon-layers"><use xlink:href="#icon-layers"></use></svg></span>
                    <span>My Listing</span>
                    <span class=" ml-auto"><i class="fal fa-chevron-down"></i></span>
                </a>
                <ul class="submenu collapse list-group list-group-flush list-group-borderless pt-2 mb-0 sidebar-menu" id="listing">
                    <li class="list-group-item p-0 mb-2 lh-15"><a href="panel-my-listing.html" class="link-hover-dark-primary font-size-md">My
                            Listing</a></li>
                </ul>
            </li>
            <li class="list-group-item p-0 mb-2 lh-15">
                <a href="panel-my-favourite.html" class="d-flex align-items-center link-hover-dark-primary font-size-md">
                    <span class="d-inline-block mr-3"><i class="fal fa-bookmark"></i></span>
                    <span>Saved</span>
                </a>
            </li>
            <li class="list-group-item p-0 mb-2 lh-15">
                <a href="#invoice" class="d-flex align-items-center link-hover-dark-primary font-size-md" data-toggle="collapse" aria-expanded="false">
                    <span class="d-inline-block mr-3"><svg class="icon icon-receipt"><use xlink:href="#icon-receipt"></use></svg></span>
                    <span>Invoices</span>
                    <span class=" ml-auto"><i class="fal fa-chevron-down"></i></span>
                </a>
                <ul class="submenu collapse list-group list-group-flush list-group-borderless pt-2 mb-0 sidebar-menu" id="invoice">
                    <li class="list-group-item p-0 mb-2 lh-15"><a href="panel-invoice-listing.html" class="link-hover-dark-primary font-size-md">Invoice
                            Listing</a></li>
                    <li class="list-group-item p-0 mb-2 lh-15"><a href="panel-invoice-details.html" class="link-hover-dark-primary font-size-md">Invoice
                            Details</a></li>
                </ul>
            </li>
            <li class="list-group-item p-0 mb-2 lh-15">
                <a href="panel-package.html" class="d-flex align-items-center link-hover-dark-primary font-size-md">
                    <span class="d-inline-block mr-3"><i class="fal fa-gift"></i></span>
                    <span>Packages</span>
                </a>
            </li>
            <li class="list-group-item p-0 mb-2 lh-15">
                <a href="#adcampaign" class="d-flex align-items-center link-hover-dark-primary font-size-md" data-toggle="collapse" aria-expanded="false">
                    <span class="d-inline-block mr-3"><i class="far fa-bullhorn"></i></span>
                    <span>Ad Campaigns</span>
                    <span class=" ml-auto"><i class="fal fa-chevron-down"></i></span>
                </a>
                <ul class="submenu collapse list-group list-group-flush list-group-borderless pt-2 mb-0 sidebar-menu" id="adcampaign">
                    <li class="list-group-item p-0 mb-2 lh-15"><a href="panel-ad-campaigns-active.html" class="link-hover-dark-primary font-size-md">Ad
                            Campaigns Active</a></li>
                    <li class="list-group-item p-0 mb-2 lh-15"><a href="panel-ad-campaigns-start-new.html" class="link-hover-dark-primary font-size-md">Ad
                            Campaigns Start new</a></li>
                </ul>
            </li>
            <li class="list-group-item p-0 mb-2 lh-15">
                <a href="#review" class="d-flex align-items-center link-hover-dark-primary font-size-md" data-toggle="collapse" aria-expanded="false">
                    <span class="d-inline-block mr-3"><i class="fal fa-star"></i></span>
                    <span>Reviews</span>
                    <span class=" ml-auto"> <i class="fal fa-chevron-down"></i></span>
                </a>
                <ul class="submenu collapse list-group list-group-flush list-group-borderless pt-2 mb-0 sidebar-menu" id="review">
                    <li class="list-group-item p-0 mb-2 lh-15"><a href="panel-review-received.html" class="link-hover-dark-primary font-size-md">Review
                            received</a></li>
                    <li class="list-group-item p-0 mb-2 lh-15"><a href="panel-review-submitted.html" class="link-hover-dark-primary font-size-md">Review
                            submitted</a></li>
                </ul>
            </li>
            <li class="list-group-item p-0 mb-2 lh-15">
                <a href="{{route('user_profile')}}" class="d-flex align-items-center link-hover-dark-primary font-size-md">
                    <span class="d-inline-block mr-3"><svg class="icon icon-user"><use xlink:href="#icon-user"></use></svg></span>
                    <span>My Profile</span>
                </a>
            </li>
            <li class="list-group-item p-0 mb-2 lh-15">
                <a href="#" class="d-flex align-items-center link-hover-dark-primary font-size-md">
                    <span class="d-inline-block mr-3"><svg class="icon icon-exit"><use xlink:href="#icon-exit"></use></svg></span>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
