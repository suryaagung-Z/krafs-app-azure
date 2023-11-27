<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper"><a href="{{ route('/') }}"><img class="img-fluid for-light"
                    src="/assets/images/logo/logo.png" alt=""><img class="img-fluid for-dark"
                    src="/assets/images/logo/logo_dark.png" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{ route('/') }}"><img class="img-fluid"
                    src="/assets/images/logo/logo-icon.png" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="{{ route('dashboard') }}"><img class="img-fluid"
                                src="/assets/images/logo/logo-icon.png" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="pin-title sidebar-main-title">
                        <div>
                            <h6>Pinned</h6>
                        </div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>General</h6>
                        </div>
                    </li>

                    @auth
                    @if (auth()->user()->role_id == '1')
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                            class="sidebar-link sidebar-title link-nav" href="{{ route('dashboard') }}">
                            <svg class="stroke-icon">
                                <use href="/assets/svg/icon-sprite.svg#stroke-home"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="/assets/svg/icon-sprite.svg#fill-home"></use>
                            </svg><span>Dashboard</span></a>
                    </li>
                    @endif
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                            class="sidebar-link sidebar-title link-nav" href="{{ route('profile.index') }}">
                            <svg class="stroke-icon">
                                <use href="/assets/svg/icon-sprite.svg#stroke-user"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="/assets/svg/icon-sprite.svg#fill-user"></use>
                            </svg><span>Profile</span></a></li>
                    @endauth

                    <li class="sidebar-main-title">
                        <div>
                            <h6>Applications</h6>
                        </div>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title"
                            href="#">
                            <svg class="stroke-icon">
                                <use href="/assets/svg/icon-sprite.svg#stroke-ecommerce"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="/assets/svg/icon-sprite.svg#fill-ecommerce"></use>
                            </svg><span>Ecommerce</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('products.index') }}">Product</a></li>
                            @auth
                            @if (auth()->user()->role_id == '1')
                            <li><a href="{{ route('product-category.index') }}">Category</a></li>
                            @elseif(auth()->user()->role_id == '2')
                            <li><a href="{{ route('order-history') }}">Order History</a></li>
                            <li><a href="{{ route('cart.index') }}">Cart</a></li>
                            <li><a href="{{ route('list-wish') }}">Wishlist</a></li>
                            @endif
                            @endauth
                        </ul>
                    </li>
                    @auth
                    <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('forum.index') }}">
                            <svg class="stroke-icon">
                                <use href="/assets/svg/icon-sprite.svg#stroke-chat"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="/assets/svg/icon-sprite.svg#fill-chat"></use>
                            </svg><span>Forum</span>
                        </a>
                    </li>
                    @endauth

                    <li class="sidebar-main-title">
                        <div>
                            <h6>Others</h6>
                        </div>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title"
                            href="#">
                            <svg class="stroke-icon">
                                <use href="/assets/svg/icon-sprite.svg#stroke-blog"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="/assets/svg/icon-sprite.svg#fill-blog"></use>
                            </svg><span>Blog</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('blog') }}">Blog Details</a></li>
                            <li><a href="{{ route('blog-single') }}">Blog Single</a></li>
                            @auth
                            @if (auth()->user()->role_id == '1')
                            <li><a href="{{ route('add-post') }}">Add Post</a></li>
                            @endif
                            @endauth
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('faq') }}">
                            <svg class="stroke-icon">
                                <use href="/assets/svg/icon-sprite.svg#stroke-faq"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="/assets/svg/icon-sprite.svg#fill-faq"></use>
                            </svg><span>FAQ</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>