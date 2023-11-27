<div class="page-header">
  <div class="header-wrapper row m-0">
    <form class="form-inline search-full col" action="#" method="get">
      <div class="form-group w-100">
        <div class="Typeahead Typeahead--twitterUsers">
          <div class="u-posRelative">
            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
              placeholder="Search Cuba .." name="q" title="" autofocus>
            <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i
              class="close-search" data-feather="x"></i>
          </div>
          <div class="Typeahead-menu"></div>
        </div>
      </div>
    </form>
    <div class="header-logo-wrapper col-auto p-0">
      <div class="logo-wrapper"><a href="{{ route('dashboard')}}"><img class="img-fluid"
            src="/assets/images/logo/logo.png" alt=""></a></div>
      <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
    </div>
    <div class="left-header col-xxl-5 col-xl-6 col-lg-5 col-md-4 col-sm-3 p-0">
      <div class="notification-slider">
        <div class="d-flex h-100"> <img src="/assets/images/giftools.gif" alt="gif">
          <h6 class="mb-0 f-w-400"><span class="font-primary">Don't Miss Out! </span><span class="f-light">Out new
              update has been release.</span></h6><i class="icon-arrow-top-right f-light"></i>
        </div>
        <div class="d-flex h-100"><img src="/assets/images/giftools.gif" alt="gif">
          <h6 class="mb-0 f-w-400"><span class="f-light">Something you love is now on sale! </span></h6><a class="ms-1"
            href="https://1.envato.market/3GVzd" target="_blank">Buy now !</a>
        </div>
      </div>
    </div>
    <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
      <ul class="nav-menus">
        <li>
          <div class="mode">
            <svg>
              <use href="/assets/svg/icon-sprite.svg#moon"></use>
            </svg>
          </div>
        </li>
        @auth
        @if (auth()->user()->role_id == '2')
        <li class="cart-nav">
          <a href="{{ route('cart.index') }}">
            <div class="cart-box">
              <svg>
                <use href="/assets/svg/icon-sprite.svg#stroke-ecommerce"></use>
              </svg>
              <span
                class="badge rounded-pill badge-success {{ $cartCount == '0' ? 'd-none' : '' }}">{{ $cartCount }}</span>
            </div>
          </a>
        </li>
        @endif
        @endauth
        @auth
        <li class="profile-nav onhover-dropdown ps-3 pe-0 py-0">
          <div class="media profile-media align-items-center">
            <img class="b-r-10 img-30 rounded-circle" src="{{ auth()->user()->profile_image }}" alt="">
            <div class="media-body"><span>{{ auth()->user()->username }}</span>
              <p class="mb-0 font-roboto">{{ auth()->user()->role->name }} <i class="middle fa fa-angle-down"></i></p>
            </div>
          </div>
          <ul class="profile-dropdown onhover-show-div">
            <li><a href="{{ route('profile.index') }}"><i data-feather="user"></i><span>Profile</span></a></li>
            <li>
              <form id="logout-form" action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <a href="javascript:void(0);" onclick="document.getElementById('logout-form').submit();">
                  <i data-feather="log-out"></i><span>Logout</span></a>
              </form>
            </li>
          </ul>
        </li>
        @else
        <li>
          <a href="{{ route('google.login') }}" class="btn btn-pill btn-light btn-air-light px-3 py-1">
            <img src="/assets/images/svg-icon/google.svg" alt="google icon" style="width:25px;">
            Login
          </a>
        </li>
        @endauth
      </ul>
    </div>
    <script class="result-template" type="text/x-handlebars-template">
      <div class="ProfileCard u-cf">                        
      <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
      <div class="ProfileCard-details">
      {{-- <div class="ProfileCard-realName">{{name}}</div> --}}
      </div>
      </div>
    </script>
    <script class="empty-template" type="text/x-handlebars-template">
      <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div>
    </script>
  </div>
</div>