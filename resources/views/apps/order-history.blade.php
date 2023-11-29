@extends('layouts.simple.master')
@section('title', 'Orders')

@section('css')

@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="/assets/css/vendors/datatables.css">
@endsection

@section('breadcrumb-title')
<h3>Order History 📝</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Ecommerce</li>
<li class="breadcrumb-item active">Order History</li>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">

      @foreach ($history as $h)
      @switch($h->status->_id)
      @case(0)
      @php $statusClass = 'primary'; $statusText = 'Processing'; @endphp
      @break

      @case(1)
      @php $statusClass = 'success'; $statusText = 'Shipped'; @endphp
      @break

      @default
      @php $statusClass = 'danger'; $statusText = 'Cancelled'; @endphp
      @endswitch

      <div class="card">
        <div class="card-header">
          <h5>{{ $statusText }} Orders</h5>
        </div>
        <div class="card-body">
          <div class="row g-sm-4 g-3">
            @foreach ($h['products'] as $hp)
            <div class="col-xxl-4 col-md-6">
              <div class="prooduct-details-box">
                <div class="media"><img class="align-self-center img-fluid img-60"
                    src="{{ $hp['productInfo']->images[0] }}" alt="#">
                  <div class="media-body ms-3">
                    <div class="product-name">
                      <h6><a href="#">{{ $hp['productInfo']->name }}</a></h6>
                    </div>
                    <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                        class="fa fa-star"></i><i class="fa fa-star"></i></div>
                    <div class="price d-flex">
                      <div class="text-muted me-2">Price</div>: Rp. {{ $hp['productInfo']->price }}
                    </div>
                    <div class="avaiabilty">
                      <div class="text-success">In stock</div>
                    </div>
                    <a class="btn btn-{{ $statusClass }} btn-xs" href="#">{{ $statusText }}</a>
                    <i class="close" data-feather="x"></i>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      @endforeach



    </div>
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h5>Datatable order history</h5>
        </div>
        <div class="card-body">
          <div class="order-history table-responsive">

            <table class="table table-bordernone display" id="basic-1">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col">Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Weight</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total Price</th>
                  <th scope="col">Category</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($history as $h)
                @foreach ($h['products'] as $hp)
                <tr>
                  <td><img class="img-fluid img-30" src="{{ $hp['productInfo']->images[0] }}" alt="#"></td>
                  <td>
                    <div class="product-name"><a href="#">{{ $hp['productInfo']->name }}</a>
                      <div class="order-process">
                        <span
                          class="order-process-circle"></span>{{ $h->status->_id == 0 ? 'Processing' : ($h->status->_id == 1 ? 'Shipped' : 'Cancelled') }}
                      </div>
                    </div>
                  </td>
                  <td>{{ $hp['productInfo']->price }}</td>
                  <td>{{ $hp['productInfo']->weight }}</td>
                  <td>{{ $hp['quantity'] }}</td>
                  <td>{{ $hp['productInfo']->price * $hp['quantity'] }}</td>
                  <td>{{ $hp['productInfo']->product_category->name }}</td>
                  <td>
                    @if ($h->status->_id == 0)
                    <span class="badge badge-primary">Processing</span>
                    @elseif ($h->status->_id == 1)
                    <span class="badge badge-success">Shipped</span>
                    @else
                    <span class="badge badge-danger">Cancelled</span>
                    @endif
                  </td>
                </tr>
                @endforeach
                @endforeach
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/js/datatable/datatables/datatable.custom.js"></script>
@endsection