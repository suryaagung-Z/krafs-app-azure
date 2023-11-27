@extends('layouts.simple.master')
@section('title', 'Product list')

@section('css')

@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="/assets/css/vendors/datatables.css">
<link rel="stylesheet" type="text/css" href="/assets/css/vendors/owlcarousel.css">
<link rel="stylesheet" type="text/css" href="/assets/css/vendors/rating.css">
@endsection

@section('breadcrumb-title')
<h3>Product list</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Ecommerce</li>
<li class="breadcrumb-item active">Product list</li>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <!-- Individual column searching (text inputs) Starts-->
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <h5 class="mb-3">Manage your products 📦</h5>
              <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse cum velit fuga distinctio quaerat
                neque quam repudiandae delectus. Doloribus, nisi!</span>
            </div>
            <div class="col-auto">
              <a class="btn btn-pill btn-primary btn-air-primary" data-bs-original-title="" title=""
                href="{{ route('products.create') }}">Add Product</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive product-table">
            <table class="display" id="basic-1">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Details</th>
                  <th>Amount</th>
                  <th>Stock</th>
                  <th>Start date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                <tr>
                  <td><img src="{{ $product->images[0] }}" alt="" width="80px" height="80px"></td>
                  <td>
                    <h6>{{ $product->name }}</h6><span>{{ $product->product_category->name }} -
                      {{ $product->description }}</span>
                  </td>
                  <td>{{ $product->price }}</td>
                  <td class="font-success">In Stock</td>
                  <td>{{ $product->created_at }}</td>
                  <td>
                    <button class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs"
                      title="">Delete</button>
                    <button class="btn btn-success btn-xs" type="button" data-original-title="btn btn-danger btn-xs"
                      title="">Edit</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Individual column searching (text inputs) Ends-->
  </div>
</div>
@endsection

@section('script')
<script src="/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/js/rating/jquery.barrating.js"></script>
<script src="/assets/js/rating/rating-script.js"></script>
<script src="/assets/js/owlcarousel/owl.carousel.js"></script>
<script src="/assets/js/ecommerce.js"></script>
<script src="/assets/js/product-list-custom.js"></script>
@endsection