@extends('layouts.simple.master')
@section('title', 'Categories')

@section('css')

@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="/assets/css/vendors/datatables.css">
<link rel="stylesheet" type="text/css" href="/assets/css/vendors/owlcarousel.css">
<link rel="stylesheet" type="text/css" href="/assets/css/vendors/rating.css">
@endsection

@section('breadcrumb-title')
<h3>Orders</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Ecommerce</li>
<li class="breadcrumb-item active">Orders</li>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <h5 class="mb-3">Manage your orders 📦</h5>
              <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse cum velit fuga distinctio quaerat
                neque quam repudiandae delectus. Doloribus, nisi!</span>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive product-table">
            <table class="display" id="basic-1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Order Total</th>
                  <th>Transfer Slip</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orders as $order)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $order->fullName }}</td>
                  <td>{{ $order->phone }}</td>
                  <td>{{ count($order->products) }}</td>
                  <td>
                    <div class="d-flex gap-1 align-items-center">
                      <img src="/assets/images/payment-method/{{$order->paymentMethod->icon}}" alt="" width="35">
                      <small>{{ $order->paymentMethod->name }}</small>
                    </div>
                  </td>
                  <td>
                    @php
                    $colorType = "";
                    $statusOrder = $order->status->_id;
                    if($statusOrder == 0){
                    $colorType = "primary";
                    }elseif($statusOrder == 1){
                    $colorType = "success";
                    }else {
                    $colorType = "danger";
                    }
                    @endphp
                    <span class="badge badge-{{$colorType}}">
                      {{ $order->status->name }}
                    </span>
                  </td>
                  <td>
                    <button type="button" class="btn btn-success btn-xs" data-original-title="btn btn-danger btn-xs"
                      title="" id="editOrder" data-href="{{ route('orders.show', $order->_id) }}">Detail</button>
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
<script lang="javascript">
  (function(){
    $('#basic-1').DataTable();

    $('button#editOrder').click(function(){
      window.location.href = $(this).data('href');
    });
  })();
</script>
@endsection