@extends('layouts.simple.master')
@section('title', 'Product')

@section('css')

@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="/assets/css/vendors/select2.css">
<link rel="stylesheet" type="text/css" href="/assets/css/vendors/owlcarousel.css">
<link rel="stylesheet" type="text/css" href="/assets/css/vendors/range-slider.css">
@endsection

@section('breadcrumb-title')
<h3>Products 🛍️</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Ecommerce</li>
<li class="breadcrumb-item active">Products</li>
@endsection

@section('content')
<div class="container-fluid product-wrapper">
  <div class="product-grid">
    <div class="feature-products">
      <div class="row">
        <div class="col-md-6 products-total">
          <div class="square-product-setting d-inline-block"><a class="icon-grid grid-layout-view" href="#"
              data-original-title="" title=""><i data-feather="grid"></i></a></div>
          <div class="square-product-setting d-inline-block"><a class="icon-grid m-0 list-layout-view" href="#"
              data-original-title="" title=""><i data-feather="list"></i></a></div><span
            class="d-none-productlist filter-toggle">
            Filters<span class="ms-2"><i class="toggle-data" data-feather="chevron-down"></i></span></span>
          <div class="grid-options d-inline-block">
            <ul>
              <li><a class="product-2-layout-view" href="#" data-original-title="" title=""><span
                    class="line-grid line-grid-1 bg-primary"></span><span
                    class="line-grid line-grid-2 bg-primary"></span></a></li>
              <li><a class="product-3-layout-view" href="#" data-original-title="" title=""><span
                    class="line-grid line-grid-3 bg-primary"></span><span
                    class="line-grid line-grid-4 bg-primary"></span><span
                    class="line-grid line-grid-5 bg-primary"></span></a></li>
              <li><a class="product-4-layout-view" href="#" data-original-title="" title=""><span
                    class="line-grid line-grid-6 bg-primary"></span><span
                    class="line-grid line-grid-7 bg-primary"></span><span
                    class="line-grid line-grid-8 bg-primary"></span><span
                    class="line-grid line-grid-9 bg-primary"></span></a></li>
              <li><a class="product-6-layout-view" href="#" data-original-title="" title=""><span
                    class="line-grid line-grid-10 bg-primary"></span><span
                    class="line-grid line-grid-11 bg-primary"></span><span
                    class="line-grid line-grid-12 bg-primary"></span><span
                    class="line-grid line-grid-13 bg-primary"></span><span
                    class="line-grid line-grid-14 bg-primary"></span><span
                    class="line-grid line-grid-15 bg-primary"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 text-sm-end"><span class="f-w-600 m-r-5">Showing Products 1 - 24 Of 200 Results</span>
          <div class="select2-drpdwn-product select-options d-inline-block">
            <select class="form-control btn-square" name="select">
              <option value="opt1">Featured</option>
              <option value="opt2">Lowest Prices</option>
              <option value="opt3">Highest Prices</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="product-sidebar">
            <div class="filter-section">
              <div class="card">
                <div class="card-header">
                  <h6 class="mb-0 f-w-600">Filters<span class="pull-right"><i
                        class="fa fa-chevron-down toggle-data"></i></span></h6>
                </div>
                <div class="left-filter">
                  <div class="card-body filter-cards-view animate-chk">
                    <div class="product-filter">
                      <h6 class="f-w-600">Category</h6>
                      <div class="checkbox-animated mt-0">
                        <label class="d-block" for="edo-ani5">
                          <input class="radio_animated" id="edo-ani5" type="radio" data-original-title="" title="">Man
                          Shirt
                        </label>
                        <label class="d-block" for="edo-ani6">
                          <input class="radio_animated" id="edo-ani6" type="radio" data-original-title="" title="">Man
                          Jeans
                        </label>
                        <label class="d-block" for="edo-ani7">
                          <input class="radio_animated" id="edo-ani7" type="radio" data-original-title="" title="">Woman
                          Top
                        </label>
                        <label class="d-block" for="edo-ani8">
                          <input class="radio_animated" id="edo-ani8" type="radio" data-original-title="" title="">Woman
                          Jeans
                        </label>
                        <label class="d-block" for="edo-ani9">
                          <input class="radio_animated" id="edo-ani9" type="radio" data-original-title="" title="">Man
                          T-shirt
                        </label>
                      </div>
                    </div>
                    <div class="product-filter pb-0">
                      <h6 class="f-w-600">Price</h6>
                      <input id="u-range-03" type="text">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-sm-12">
          <form>
            <div class="form-group m-0">
              <input class="form-control" type="search" placeholder="Search.." data-original-title="" title=""><i
                class="fa fa-search"></i>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="product-wrapper-grid">
      <div class="row">
        @foreach ($products as $product)
        @php
        $randomNumber = rand(0, 3);
        @endphp
        <div class="col-xl-3 col-sm-6 xl-4">
          <div class="card">
            <div class="product-box">
              <div class="product-img"><img class="img-fluid" src="{{ $product->images[$randomNumber] }}" alt=""
                  style="height: 300px; width: 100%; object-fit: cover;">
                <div class="product-hover">
                  <ul>
                    <li class="p-0 w-auto h-auto">
                      <form action="{{ route('cart.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->_id}}">
                        <input type="hidden" value="1" name="quantity">
                        <button class="btn w-100 h-100 p-3 d-flex justify-content-center align-items-center"
                          type="submit"><i class="icon-shopping-cart m-0"></i></button>
                      </form>
                    </li>
                    <li class="p-0 w-auto h-auto">
                      <button class="btn w-100 h-100 p-3 d-flex justify-content-center align-items-center" type="button"
                        data-bs-toggle="modal" data-bs-target="#modalProduct-{{ $product->_id }}"><i
                          class="icon-eye m-0"></i></button>
                    </li>
                    <li class="p-0 w-auto h-auto">
                      <button class="btn w-100 h-100 p-3 d-flex justify-content-center align-items-center"
                        type="button"><i class="icofont icofont-ui-love"></i></button>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="product-details">
                {{-- <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><a href="{{ route('product-page')}}">
                --}}
                <h4>{{ $product->name }}</h4></a>
                <p>{{ $product->product_category->name }}</p>
                <div class="product-price">Rp. {{ $product->price }}
                  {{-- <del>$350.00</del> --}}
                </div>
              </div>
              <div class="modal fade" id="modalProduct-{{ $product->_id }}" tabindex="-1" role="dialog"
                aria-labelledby="modalProduct-{{ $product->_id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="product-box row">
                        <div class="product-img col-lg-6">
                          <img class="img-fluid" src="{{ $product->images[$randomNumber] }}" alt=""
                            style="object-fit: cover;">
                        </div>
                        <div class="product-details col-lg-6 text-start">
                          <h4>{{ $product->name }}</h4>
                          <div class="product-price">Rp. {{ $product->price }}
                            {{-- <del>$350.00</del> --}}
                          </div>
                          <div class="product-view">
                            <h6 class="f-w-600">Product Details</h6>
                            <p class="mb-0">{{ $product->description }}</p>
                          </div>
                          {{-- <div class="product-size">
                             <ul>
                               <li> 
                                 <button class="btn btn-outline-light" type="button">M</button>
                               </li>
                               <li> 
                                 <button class="btn btn-outline-light" type="button">L</button>
                               </li>
                               <li> 
                                 <button class="btn btn-outline-light" type="button">Xl</button>
                               </li>
                             </ul>
                           </div> --}}
                          <div class="product-qnty">
                            <h6 class="f-w-600">Quantity</h6>
                            <form action="{{ route('cart.store')}}" method="POST">
                              @csrf
                              <fieldset>
                                <div class="input-group">
                                  <input class="touchspin text-center" type="number" value="1" name="quantity">
                                </div>
                              </fieldset>
                              <div class="addcart-btn d-flex">
                                <input type="hidden" name="id" value="{{$product->_id}}">
                                <button class="btn btn-primary" type="submit">Add to Cart</button>
                                <a class="btn btn-primary ms-2" href="{{ route('products.show', $product->_id)}}">View
                                  Details</a>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="/assets/js/range-slider/ion.rangeSlider.min.js"></script>
<script src="/assets/js/range-slider/rangeslider-script.js"></script>
<script src="/assets/js/touchspin/vendors.min.js"></script>
<script src="/assets/js/touchspin/touchspin.js"></script>
<script src="/assets/js/touchspin/input-groups.min.js"></script>
<script src="/assets/js/owlcarousel/owl.carousel.js"></script>
<script src="/assets/js/select2/select2.full.min.js"></script>
<script src="/assets/js/select2/select2-custom.js"></script>
<script src="/assets/js/product-tab.js"></script>
@endsection