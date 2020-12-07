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
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/message-boxes*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
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
                </ul>
            </li>
        @endcan
        @can('product_service_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/categories*") ? "c-show" : "" }} {{ request()->is("admin/sub-categories*") ? "c-show" : "" }} {{ request()->is("admin/products*") ? "c-show" : "" }} {{ request()->is("admin/services*") ? "c-show" : "" }} {{ request()->is("admin/premium-product-listings*") ? "c-show" : "" }} {{ request()->is("admin/premium-service-listings*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-align-justify c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.productService.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-code-branch c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.category.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sub_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sub-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sub-categories") || request()->is("admin/sub-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-coins c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.subCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.products.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.product.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('service_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.services.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/services") || request()->is("admin/services/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-american-sign-language-interpreting c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.service.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('premium_product_listing_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.premium-product-listings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/premium-product-listings") || request()->is("admin/premium-product-listings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-crown c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.premiumProductListing.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('premium_service_listing_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.premium-service-listings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/premium-service-listings") || request()->is("admin/premium-service-listings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-crown c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.premiumServiceListing.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('admin_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/plans*") ? "c-show" : "" }} {{ request()->is("admin/ads*") ? "c-show" : "" }} {{ request()->is("admin/payment-gateway-configurations*") ? "c-show" : "" }} {{ request()->is("admin/email-configurations*") ? "c-show" : "" }} {{ request()->is("admin/sliders*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-toolbox c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.admin.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('plan_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.plans.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/plans") || request()->is("admin/plans/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-align-left c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.plan.title') }}
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
                    @can('payment_gateway_configuration_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.payment-gateway-configurations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/payment-gateway-configurations") || request()->is("admin/payment-gateway-configurations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-rupee-sign c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.paymentGatewayConfiguration.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('email_configuration_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.email-configurations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/email-configurations") || request()->is("admin/email-configurations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-at c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.emailConfiguration.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('slider_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sliders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sliders") || request()->is("admin/sliders/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-clone c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.slider.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('moderator_menu_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/product-to-approves*") ? "c-show" : "" }} {{ request()->is("admin/service-to-approves*") ? "c-show" : "" }} {{ request()->is("admin/massage-box-for-moderators*") ? "c-show" : "" }} {{ request()->is("admin/profile-for-moderators*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-user-secret c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.moderatorMenu.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('product_to_approve_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.product-to-approves.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/product-to-approves") || request()->is("admin/product-to-approves/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-check c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.productToApprove.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('service_to_approve_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.service-to-approves.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/service-to-approves") || request()->is("admin/service-to-approves/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-check c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.serviceToApprove.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('massage_box_for_moderator_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.massage-box-for-moderators.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/massage-box-for-moderators") || request()->is("admin/massage-box-for-moderators/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-envelope-square c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.massageBoxForModerator.title') }}
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
                </ul>
            </li>
        @endcan
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
        @can('website_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/top-navigations*") ? "c-show" : "" }} {{ request()->is("admin/highlighted-categories*") ? "c-show" : "" }} {{ request()->is("admin/highlighted-sub-categories*") ? "c-show" : "" }} {{ request()->is("admin/client-reviews*") ? "c-show" : "" }} {{ request()->is("admin/articles*") ? "c-show" : "" }} {{ request()->is("admin/article-tags*") ? "c-show" : "" }} {{ request()->is("admin/website-settings*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fab fa-weebly c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.website.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
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
                    @can('website_setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.website-settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/website-settings") || request()->is("admin/website-settings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.websiteSetting.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
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