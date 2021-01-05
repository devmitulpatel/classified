<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/permission-group-for-admins*") ? "c-show" : "" }} {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/message-boxes*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                   @if(false)
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                   @endif
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                       @if(false)
                    @can('permission_group_for_admin_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permission-group-for-admins.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permission-group-for-admins") || request()->is("admin/permission-group-for-admins/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permissionGroupForAdmin.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('message_box_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.message-boxes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/message-boxes") || request()->is("admin/message-boxes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-envelope-square c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.messageBox.title') }}
                            </a>
                        </li>
                    @endcan
                    @endif
                </ul>
            </li>
        @endcan

        @can('admin_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/to-approve-vendor-for-admins*") ? "c-show" : "" }} {{ request()->is("admin/categories-for-admins*") ? "c-show" : "" }} {{ request()->is("admin/sub-category-for-admins*") ? "c-show" : "" }} {{ request()->is("admin/ads*") ? "c-show" : "" }} {{ request()->is("admin/plans*") ? "c-show" : "" }} {{ request()->is("admin/payment-gateway-for-admins*") ? "c-show" : "" }} {{ request()->is("admin/email-settings-for-admins*") ? "c-show" : "" }} {{ request()->is("admin/website-settings*") ? "c-show" : "" }} {{ request()->is("admin/payment-for-admins*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-toolbox c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.admin.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('to_approve_vendor_for_admin_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.to-approve-vendor-for-admins.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/to-approve-vendor-for-admins") || request()->is("admin/to-approve-vendor-for-admins/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-check c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.toApproveVendorForAdmin.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('categories_for_admin_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.categories-for-admins.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/categories-for-admins") || request()->is("admin/categories-for-admins/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-code-branch c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.categoriesForAdmin.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sub_category_for_admin_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sub-category-for-admins.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sub-category-for-admins") || request()->is("admin/sub-category-for-admins/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-coins c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.subCategoryForAdmin.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('ad_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.ads.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/ads") || request()->is("admin/ads/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-eye c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.ad.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('plan_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.plans.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/plans") || request()->is("admin/plans/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-align-left c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.plan.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('payment_gateway_for_admin_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.payment-gateway-for-admins.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/payment-gateway-for-admins") || request()->is("admin/payment-gateway-for-admins/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.paymentGatewayForAdmin.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('email_settings_for_admin_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.email-settings-for-admins.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/email-settings-for-admins") || request()->is("admin/email-settings-for-admins/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.emailSettingsForAdmin.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('website_setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.website-settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/website-settings") || request()->is("admin/website-settings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.websiteSetting.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('payment_for_admin_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.payment-for-admins.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/payment-for-admins") || request()->is("admin/payment-for-admins/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.paymentForAdmin.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan

        @if(auth()->user()->roles->contains(MODERATOR_ROLE))
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/product-for-vendors*") ? "c-show" : "" }} {{ request()->is("admin/service-for-vendors*") ? "c-show" : "" }} {{ request()->is("admin/p-product-listing-for-vendors*") ? "c-show" : "" }} {{ request()->is("admin/p-service-listing-for-vendors*") ? "c-show" : "" }} {{ request()->is("admin/message-box-for-vendors*") ? "c-show" : "" }} {{ request()->is("admin/profile-for-vendors*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    Product & Services
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('product_for_vendor_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.product-for-vendors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/product-for-vendors") || request()->is("admin/product-for-vendors/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.productForVendor.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('service_for_vendor_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.service-for-vendors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/service-for-vendors") || request()->is("admin/service-for-vendors/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-american-sign-language-interpreting c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.serviceForVendor.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endif

    @if (!auth()->user()->roles->contains(ADMIN_ROLE))

            @can('moderator_for_moderator_access')


                @can('p_to_approve_for_moderator_access')
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route("admin.p-to-approve-for-moderators.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/p-to-approve-for-moderators") || request()->is("admin/p-to-approve-for-moderators/*") ? "c-active" : "" }}">
                            <i class="fa-fw fas fa-check c-sidebar-nav-icon">

                            </i>
                            {{ trans('cruds.pToApproveForModerator.title') }}
                        </a>
                    </li>
                @endcan
                @can('s_to_approve_for_moderator_access')
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route("admin.s-to-approve-for-moderators.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/s-to-approve-for-moderators") || request()->is("admin/s-to-approve-for-moderators/*") ? "c-active" : "" }}">
                            <i class="fa-fw fas fa-check c-sidebar-nav-icon">

                            </i>
                            {{ trans('cruds.sToApproveForModerator.title') }}
                        </a>
                    </li>
                @endcan
                    @can('profile_for_moderator_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.profile-for-moderators.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/profile-for-moderators") || request()->is("admin/profile-for-moderators/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-cog c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.profileForModerator.title') }}
                            </a>
                        </li>
                    @endcan

            @endcan
        @endif

        @if (!auth()->user()->roles->contains(ADMIN_ROLE))
        @can('vendor_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/product-for-vendors*") ? "c-show" : "" }} {{ request()->is("admin/service-for-vendors*") ? "c-show" : "" }} {{ request()->is("admin/p-product-listing-for-vendors*") ? "c-show" : "" }} {{ request()->is("admin/p-service-listing-for-vendors*") ? "c-show" : "" }} {{ request()->is("admin/message-box-for-vendors*") ? "c-show" : "" }} {{ request()->is("admin/profile-for-vendors*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.vendor.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('product_for_vendor_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.product-for-vendors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/product-for-vendors") || request()->is("admin/product-for-vendors/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.productForVendor.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('service_for_vendor_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.service-for-vendors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/service-for-vendors") || request()->is("admin/service-for-vendors/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-american-sign-language-interpreting c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.serviceForVendor.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('p_product_listing_for_vendor_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.p-product-listing-for-vendors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/p-product-listing-for-vendors") || request()->is("admin/p-product-listing-for-vendors/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-crown c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.pProductListingForVendor.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('p_service_listing_for_vendor_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.p-service-listing-for-vendors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/p-service-listing-for-vendors") || request()->is("admin/p-service-listing-for-vendors/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-crown c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.pServiceListingForVendor.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('message_box_for_vendor_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.message-box-for-vendors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/message-box-for-vendors") || request()->is("admin/message-box-for-vendors/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-envelope-square c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.messageBoxForVendor.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('profile_for_vendor_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.profile-for-vendors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/profile-for-vendors") || request()->is("admin/profile-for-vendors/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-cog c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.profileForVendor.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @endif

        @if (!auth()->user()->roles->contains(ADMIN_ROLE))
        @can('user_menu_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/services-for-users*") ? "c-show" : "" }} {{ request()->is("admin/products-for-users*") ? "c-show" : "" }} {{ request()->is("admin/massage-box-for-users*") ? "c-show" : "" }} {{ request()->is("admin/profile-for-users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userMenu.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('services_for_user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.services-for-users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/services-for-users") || request()->is("admin/services-for-users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-american-sign-language-interpreting c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.servicesForUser.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('products_for_user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.products-for-users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/products-for-users") || request()->is("admin/products-for-users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.productsForUser.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('massage_box_for_user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.massage-box-for-users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/massage-box-for-users") || request()->is("admin/massage-box-for-users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-envelope-square c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.massageBoxForUser.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('profile_for_user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.profile-for-users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/profile-for-users") || request()->is("admin/profile-for-users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-cog c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.profileForUser.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @endif


        @can('website_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/sliders*") ? "c-show" : "" }} {{ request()->is("admin/top-navigations*") ? "c-show" : "" }} {{ request()->is("admin/highlighted-categories*") ? "c-show" : "" }} {{ request()->is("admin/highlighted-sub-categories*") ? "c-show" : "" }} {{ request()->is("admin/highlighted-cities-for-admins*") ? "c-show" : "" }} {{ request()->is("admin/client-reviews*") ? "c-show" : "" }} {{ request()->is("admin/articles*") ? "c-show" : "" }} {{ request()->is("admin/article-tags*") ? "c-show" : "" }} {{ request()->is("admin/feedback-for-admins*") ? "c-show" : "" }} {{ request()->is("admin/query-from-website-for-admins*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fab fa-weebly c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.website.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('slider_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sliders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sliders") || request()->is("admin/sliders/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-clone c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.slider.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('top_navigation_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.top-navigations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/top-navigations") || request()->is("admin/top-navigations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bars c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.topNavigation.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('highlighted_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.highlighted-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/highlighted-categories") || request()->is("admin/highlighted-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-code-branch c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.highlightedCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('highlighted_sub_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.highlighted-sub-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/highlighted-sub-categories") || request()->is("admin/highlighted-sub-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-coins c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.highlightedSubCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('highlighted_cities_for_admin_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.highlighted-cities-for-admins.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/highlighted-cities-for-admins") || request()->is("admin/highlighted-cities-for-admins/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.highlightedCitiesForAdmin.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('client_review_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.client-reviews.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/client-reviews") || request()->is("admin/client-reviews/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-comments c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.clientReview.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('article_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.articles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/articles") || request()->is("admin/articles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-newspaper c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.article.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('article_tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.article-tags.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/article-tags") || request()->is("admin/article-tags/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-tags c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.articleTag.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('feedback_for_admin_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.feedback-for-admins.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/feedback-for-admins") || request()->is("admin/feedback-for-admins/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-comments c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.feedbackForAdmin.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('query_from_website_for_admin_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.query-from-website-for-admins.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/query-from-website-for-admins") || request()->is("admin/query-from-website-for-admins/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-comment-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.queryFromWebsiteForAdmin.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(!auth()->user()->roles->contains(3)  && file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>



    </ul>

</div>
