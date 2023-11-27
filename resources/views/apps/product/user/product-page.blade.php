@extends('layouts.simple.master')
@section('title', 'Product Page')

@section('css')

@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="/assets/css/vendors/owlcarousel.css">
<link rel="stylesheet" type="text/css" href="/assets/css/vendors/rating.css">
@endsection

@section('breadcrumb-title')
<h3>Product Page</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Ecommerce</li>
<li class="breadcrumb-item">Products</li>
<li class="breadcrumb-item active">{{ $product->name }}</li>
@endsection

@section('content')
<div class="container-fluid">
  <div>
    <div class="row product-page-main p-0">
      <div class="col-xxl-4 col-md-6 box-col-12">
        <div class="card">
          <div class="card-body">
            <div class="product-slider owl-carousel owl-theme" id="sync1">
              @foreach ($product->images as $image)
              <div class="item"><img src="{{ $image }}" alt="" style="max-height: 320px; object-fit: cover;"></div>
              @endforeach
            </div>
            <div class="owl-carousel owl-theme" id="sync2">
              @foreach ($product->images as $image)
              <div class="item"><img src="{{ $image }}" alt="" style="height: 70px; object-fit: cover;"></div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="col-xxl-5 box-col-6 order-xxl-0 order-1">
        <div class="card">
          <div class="card-body">
            <div class="product-page-details">
              <h3>{{ $product->name }}</h3>
            </div>
            <div class="product-price">Rp. {{ $product->price }}
              {{-- <del>$350.00 </del> --}}
            </div>
            {{-- <ul class="product-color">
               <li class="bg-primary"></li>
               <li class="bg-secondary"></li>
               <li class="bg-success"></li>
               <li class="bg-info"></li>
               <li class="bg-warning"></li>
             </ul> --}}
            <hr>
            <p>{{ $product->description }}</p>
            <hr>
            <div>
              <table class="product-page-width">
                <tbody>
                  <tr>
                    <td><b>Brand</b></td>
                    <td>&nbsp;:&nbsp;</td>
                    <td>{{ $product->name }}</td>
                  </tr>
                  <tr>
                    <td><b>Stock</b></td>
                    <td>&nbsp;:&nbsp;</td>
                    <td>{{ $product->stock }}</td>
                  </tr>
                  <tr>
                    <td><b>Availability</b></td>
                    <td>&nbsp;:&nbsp;</td>
                    @if ($product->stock > 0)
                    <td class="txt-success">In stock</td>
                    @else
                    <td class="txt-danger">Out of stock</td>
                    @endif
                  </tr>
                  <tr>
                    <td><b>Weight</b></td>
                    <td>&nbsp;:&nbsp;</td>
                    <td>{{ $product->weight }}kg</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-4">
                <h6 class="product-title">share it</h6>
              </div>
              <div class="col-md-8">
                <div class="product-icon">
                  <ul class="product-social">
                    <li class="d-inline-block"><a href="https://www.facebook.com/" target="_blank"><i
                          class="fa fa-facebook"></i></a></li>
                    <li class="d-inline-block"><a href="https://accounts.google.com/" target="_blank"><i
                          class="fa fa-google-plus"></i></a></li>
                    <li class="d-inline-block"><a href="https://twitter.com/" target="_blank"><i
                          class="fa fa-twitter"></i></a></li>
                    <li class="d-inline-block"><a href="https://www.instagram.com/" target="_blank"><i
                          class="fa fa-instagram"></i></a></li>
                    <li class="d-inline-block"><a href="https://rss.app/" target="_blank"><i class="fa fa-rss"></i></a>
                    </li>
                  </ul>
                  <form class="d-inline-block f-right"></form>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-4">
                <h6 class="product-title">Rate Now</h6>
              </div>
              <div class="col-md-8">
                <div class="d-flex">
                  <select id="u-rating-fontawesome" name="rating" autocomplete="off">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select><span>(0 review)</span>
                </div>
              </div>
            </div>
            <hr>
            <div class="m-t-15 btn-showcase row gap-2">
              <form action="{{ route('cart.store', $product->_id)}}" method="post" class="col-auto p-0">
                @csrf
                <input type="hidden" name="id" value="{{$product->_id}}">
                <input type="hidden" value="1" name="quantity">
                <button class="btn btn-primary m-0" type="submit">
                  <i class="fa fa-shopping-basket me-1"></i>
                  Add To Cart</button>
              </form>
              <form action="" method="post" class="col-auto p-0">
                <button class="btn btn-success m-0" href="" title="" type="submit">
                  <i class="fa fa-shopping-cart"></i>
                  Buy Now</button>
              </form>
              <form action="" method="post" class="col-auto p-0">
                <button class="btn btn-secondary m-0" href="" type="submit">
                  <i class="fa fa-heart me-1"></i>
                  Add To WishList</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xxl-3 col-md-6 box-col-6">
        <div class="card">
          <div class="card-body">
            <!-- side-bar colleps block stat-->
            <div class="filter-block">
              <h4>{{ $product->name }}</h4>
              <ul>
                <li>{{ $product->product_category->name }}</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="collection-filter-block">
              <ul class="pro-services">
                <li>
                  <div class="media"><i data-feather="truck"></i>
                    <div class="media-body">
                      <h5>Free Shipping </h5>
                      <p>Free Shipping World Wide</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media"><i data-feather="clock"></i>
                    <div class="media-body">
                      <h5>24 X 7 Service </h5>
                      <p>Online Service For New Customer</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media"><i data-feather="gift"></i>
                    <div class="media-body">
                      <h5>Festival Offer </h5>
                      <p>New Online Special Festival</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media"><i data-feather="credit-card"></i>
                    <div class="media-body">
                      <h5>Online Payment </h5>
                      <p>Contrary To Popular Belief. </p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!-- silde-bar colleps block end here-->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="/assets/js/sidebar-menu.js"></script>
<script src="/assets/js/rating/jquery.barrating.js"></script>
<script src="/assets/js/rating/rating-script.js"></script>
<script src="/assets/js/owlcarousel/owl.carousel.js"></script>
<script src="/assets/js/ecommerce.js"></script>
@endsection