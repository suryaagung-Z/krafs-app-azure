<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
    rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="/assets/images/landing/KRAFS-Nobg.png" />
  <title>KRAFS</title>
  <!-- Bootstrap core CSS -->
  <link href="/assets/css/vendors/bootstrap/bootstrap.css" rel="stylesheet" />

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
  <link rel="stylesheet" href="/assets/css/style-landing.css" />
  <link rel="stylesheet" href="/assets/css/vendors/animate.css" />
  <link rel="stylesheet" href="/assets/css/vendors/owlcarousel.css" />
  <link rel="stylesheet" href="/assets/css/vendors/aos.css" />
</head>

<body>
  {{-- {{ var_dump(auth()->user()->customer->fullName) }} --}}
  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky animated-bawah">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <img src="/assets/images/landing/logo.png" alt="Chain App Dev" />
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="{{ route('products.index') }}" class="">Shop</a></li>
              <li class="scroll-to-section"><a href="{{ route('forum.index') }}" class="">Forum</a></li>
              <li class="scroll-to-section"><a href="{{ route('blog') }}" class="">Artikel</a></li>
              <li class="scroll-to-section"><a href="" class="">Contact</a></li>

              @auth
              <li class="dropdown">
                <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Welcome, {{ auth()->user()->username }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a></li>
                  @if (auth()->user()->role_id == '1')
                  <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                  @endif
                  <li>
                    <hr class="dropdown-divider flex-fill">
                  </li>
                  <li>
                    <form action="{{ route('auth.logout') }}" method="POST" class="flex-fill">
                      @csrf
                      <button type="submit" class="dropdown-item">Sign-out</button>
                    </form>
                  </li>
                </ul>
              </li>
              @else
              <li>
                <div class="gradient-button w-100">
                  <a href="{{ route('google.login') }}" class="py-2 px-3 d-flex align-items-center">
                    <img src="/assets/images/svg-icon/google.svg" alt="google icon" style="width:25px;">
                    <small>Login</small>
                  </a>
                </div>
              </li>
              @endauth
            </ul>
            <a class="menu-trigger">
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- content -->
  <!-- merch -->
  <div class="main-banner fadeIn" id="top">
    <div class="container trigger-header">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center" data-aos="fade-right">
              <div class="left-content show-up header-text">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>KOPI TERBAIK ADA DI KRAFS.</h2>
                    <p>Website ini menawarkan berbagai produk dari komoditas kopi, tidak hanya dalam bentuk minuman,
                      namun dalam banyak bentuk turunan hasil dari komoditas kopi.</p>
                  </div>
                  <div class="col-lg-12">
                    <div class="white-button first-button scroll-to-section">
                      <a href="merchant.html">Go to Merchant</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
              <div class="right-image">
                <img src="/assets/images/landing/semleew.png" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- chat -->
  <div id="forum" class="about-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center" data-aos="fade-right" data-aos-duration="1000">
          <div class="section-heading">
            <h4>Forum <em>and </em>Chatbot Ai</h4>
            <img src="/assets/images/landing/heading-line-dec.png" alt="" />
            <p>Kami menawarkan fitur forum dan chatbot ai untuk anda yang ingin bertanya-tanya ataupun hanya sekedar
              ingin berdiskusi mengenai kopi.</p>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="box-item">
                <h5>Siap melayani 24 jam</h5>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h5>Dibantu oleh ahli</h5>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h5>Chatbot pintar</h5>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h5>Diskusi realtime</h5>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="white-button first-button scroll-to-section">
                <a href="">Go to Forum</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
          <div class="right-image">
            <img src="/assets/images/landing/Chat bot-pana.png" alt="" />
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- artikel -->
  <div id="articles" class="services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading" data-aos="fade-down" data-aos-duration="700">
            <h4>Lihat <em>artikel</em> terbaru dari kami</h4>
            <img src="/assets/images/landing/heading-line-dec.png" alt="" />
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3" data-aos="fade-right" data-aos-duration="1500">
          <div class="service-item first-service">
            <img src="/assets/images/landing/gambarkopi.jpg" />
            <h4>Lorem ipsum</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, corporis vero sunt minima incidunt</p>
            <div class="text-button">
              <a href="detailarticle.html">Read More <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3" data-aos="fade-right" data-aos-duration="1500">
          <div class="service-item second-service">
            <img src="/assets/images/landing/gambarkopi.jpg" />
            <h4>Lorem ipsum</h4>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi nihil obcaecati magnam et soluta quis eum
            </p>
            <div class="text-button">
              <a href="detailarticle.html">Read More <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3" data-aos="fade-left" data-aos-duration="1500">
          <div class="service-item third-service">
            <img src="/assets/images/landing/gambarkopi.jpg" />
            <h4>Lorem ipsum</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, eos vero. Culpa dolorum sunt voluptatem
            </p>
            <div class="text-button">
              <a href="detailarticle.html">Read More <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3" data-aos="fade-left" data-aos-duration="1500">
          <div class="service-item fourth-service">
            <img src="/assets/images/landing/gambarkopi.jpg" />
            <h4>Lorem ipsum</h4>
            <p>Lorem ipsum dolor consectetur adipiscing elit sedder williamsburg photo booth quinoa and fashion axe.</p>
            <div class="text-button">
              <a href="detailarticle.html">Read More <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- footer -->
  <footer id="newsletter" data-aos="fade-up">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="d-flex justify-content-center">
          <div class="col-lg-3">
            <div class="footer-widget">
              <h4>About Us</h4>
              <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Shop</a></li>
                <li><a href="">Forum</a></li>
                <li><a href="">Article</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="footer-widget">
              <h4>Useful Links</h4>
              <ul>
                <li><a href="#">Free Apps</a></li>
                <li><a href="#">App Engine</a></li>
                <li><a href="#">Programming</a></li>
                <li><a href="#">Development</a></li>
                <li><a href="#">App News</a></li>
              </ul>
              <ul>
                <li><a href="#">App Dev Team</a></li>
                <li><a href="#">Digital Web</a></li>
                <li><a href="#">Normal Apps</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="footer-widget">
              <h4>About Our Company</h4>
              <div class="logo">
                <a href="#top"><img src="/assets/images/landing/KRAFS-footer.png" alt=""
                    style="width: 45px; height: 46px;" id="logo-footer" /></a>
              </div>
              <p>Kopi Terbaik ada di Krafs</p>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="copyright-text">
            <p>Copyright © Kopi Krafs <br />Kopi Krafs</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!---->
  <script src="/assets/js/jquery-3.5.1.min.js"></script>
  <script src="/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="/assets/js/isotope.pkgd.js"></script>
  <script src="/assets/js/animation/aos/aos.js"></script>
  <script src="/assets/js/owlcarousel/owl.carousel.js"></script>
  <script lang="javascript">
    (function ($) {
      "use strict";

      // AOS
      $(".grid").isotope({
        itemSelector: ".grid-item",
      });
      AOS.init({
        duration: 800,
      });

      // Header Type = Fixed
      $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        var triggerHeader = document
          .querySelector(".trigger-header")
          .getBoundingClientRect().top;

        if (scroll >= triggerHeader) {
          $("header").addClass("background-header");
        } else {
          $("header").removeClass("background-header");
        }
      });

      $(".loop").owlCarousel({
        center: true,
        items: 1,
        loop: true,
        autoplay: true,
        nav: true,
        margin: 0,
        responsive: {
          1200: {
            items: 5,
          },
          992: {
            items: 3,
          },
          760: {
            items: 2,
          },
        },
      });

      // Acc
      $(document).on("click", ".naccs .menu div", function () {
        var numberIndex = $(this).index();

        if (!$(this).is("active")) {
          $(".naccs .menu div").removeClass("active");
          $(".naccs ul li").removeClass("active");

          $(this).addClass("active");
          $(".naccs ul")
            .find("li:eq(" + numberIndex + ")")
            .addClass("active");

          var listItemHeight = $(".naccs ul")
            .find("li:eq(" + numberIndex + ")")
            .innerHeight();
          $(".naccs ul").height(listItemHeight + "px");
        }
      });

      // Menu Dropdown Toggle
      if ($(".menu-trigger").length) {
        $(".menu-trigger").on("click", function () {
          $(this).toggleClass("active");
          $(".header-area .nav").slideToggle(200);
        });
      }

      // Menu elevator animation
      $(".scroll-to-section a[href*=\\#]:not([href=\\#])").on("click", function () {
        if (
          location.pathname.replace(/^\//, "") ==
            this.pathname.replace(/^\//, "") &&
          location.hostname == this.hostname
        ) {
          var target = $(this.hash);
          target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
          if (target.length) {
            var width = $(window).width();
            if (width < 991) {
              $(".menu-trigger").removeClass("active");
              $(".header-area .nav").slideUp(200);
            }
            $("html,body").animate(
              {
                scrollTop: target.offset().top + 1,
              },
              700
            );
            return false;
          }
        }
      });

      $(document).ready(function () {
        $(document).on("scroll", onScroll);

        //smoothscroll
        $('.scroll-to-section a[href^="#"]').on("click", function (e) {
          e.preventDefault();
          $(document).off("scroll");

          $(".scroll-to-section a").each(function () {
            $(this).removeClass("active");
          });
          $(this).addClass("active");

          var target = this.hash,
            menu = target;
          var target = $(this.hash);
          $("html, body")
            .stop()
            .animate(
              {
                scrollTop: target.offset().top + 1,
              },
              500,
              "swing",
              function () {
                window.location.hash = target;
                $(document).on("scroll", onScroll);
              }
            );
        });
      });

      function onScroll(event) {
        var scrollPos = $(document).scrollTop();
        $(".nav a").each(function () {
          var currLink = $(this);
          var targetId = currLink.attr("href");
          var refElement = $(targetId);

          // Periksa apakah refElement ada
          if (refElement.length > 0) {
            if (
              refElement.position().top <= scrollPos &&
              refElement.position().top + refElement.height() > scrollPos
            ) {
              $(".nav ul li a").removeClass("active");
              currLink.addClass("active");
            } else {
              currLink.removeClass("active");
            }
          }
        });
      }

      // Acc
      $(document).on("click", ".naccs .menu div", function () {
        var numberIndex = $(this).index();

        if (!$(this).is("active")) {
          $(".naccs .menu div").removeClass("active");
          $(".naccs ul li").removeClass("active");

          $(this).addClass("active");
          $(".naccs ul")
            .find("li:eq(" + numberIndex + ")")
            .addClass("active");

          var listItemHeight = $(".naccs ul")
            .find("li:eq(" + numberIndex + ")")
            .innerHeight();
          $(".naccs ul").height(listItemHeight + "px");
        }
      });

      // Page loading animation
      $(window).on("load", function () {
        $("#js-preloader").addClass("loaded");
      });

      // Window Resize Mobile Menu Fix
      function mobileNav() {
        var width = $(window).width();
        $(".submenu").on("click", function () {
          if (width < 767) {
            $(".submenu ul").removeClass("active");
            $(this).find("ul").toggleClass("active");
          }
        });
      }
    })(window.jQuery);
  </script>
</body>

</html>