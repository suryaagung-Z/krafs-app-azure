@extends('layouts.simple.master')
@section('title', 'Recent Orders')

@section('css')

@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="/assets/css/vendors/datatables.css">
@endsection

@section('breadcrumb-title')
<h3>Recent Orders</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Ecommerce</li>
<li class="breadcrumb-item active">Recent Orders</li>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h5>New Orders</h5>
        </div>
        <div class="card-body">
          <div class="row g-sm-4 g-3">
            <div class="col-xxl-4 col-md-6">
              <div class="prooduct-details-box">
                <div class="media"><img class="align-self-center img-fluid img-60"
                    src="/assets/images/ecommerce/product-table-6.png" alt="#">
                  <div class="media-body ms-3">
                    <div class="product-name">
                      <h6><a href="#">Women Top</a></h6>
                    </div>
                    <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                        class="fa fa-star"></i><i class="fa fa-star"></i></div>
                    <div class="price d-flex">
                      <div class="text-muted me-2">Price</div>: 210
                    </div>
                    <div class="avaiabilty">
                      <div class="text-success">In stock</div>
                    </div><a class="btn btn-primary btn-xs" href="#">Processing</a><i class="close"
                      data-feather="x"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-4 col-md-6">
              <div class="prooduct-details-box">
                <div class="media"><img class="align-self-center img-fluid img-60"
                    src="/assets/images/ecommerce/product-table-5.png" alt="#">
                  <div class="media-body ms-3">
                    <div class="product-name">
                      <h6><a href="#"> Women Shorts</a></h6>
                    </div>
                    <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                        class="fa fa-star"></i><i class="fa fa-star"></i></div>
                    <div class="price d-flex">
                      <div class="text-muted me-2">Price</div>: 210
                    </div>
                    <div class="avaiabilty">
                      <div class="text-success">In stock</div>
                    </div><a class="btn btn-primary btn-xs" href="#">Processing</a><i class="close"
                      data-feather="x"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-4 col-md-6">
              <div class="prooduct-details-box">
                <div class="media"><img class="align-self-center img-fluid img-60"
                    src="/assets/images/ecommerce/product-table-4.png" alt="#">
                  <div class="media-body ms-3">
                    <div class="product-name">
                      <h6><a href="#">Cyclamen </a></h6>
                    </div>
                    <div class="rating"> <i class="fa fa-star"></i><i class="fa fa-star"></i><i
                        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                    <div class="price d-flex">
                      <div class="text-muted me-2">Price</div>: 210
                    </div>
                    <div class="avaiabilty">
                      <div class="text-success">In stock</div>
                    </div><a class="btn btn-primary btn-xs" href="#">Processing</a><i class="close"
                      data-feather="x"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h5>Shipped Orders</h5>
        </div>
        <div class="card-body">
          <div class="row g-sm-4 g-3">
            <div class="col-xxl-4 col-md-6">
              <div class="prooduct-details-box">
                <div class="media"><img class="align-self-center img-fluid img-60"
                    src="/assets/images/ecommerce/product-table-6.png" alt="#">
                  <div class="media-body ms-3">
                    <div class="product-name">
                      <h6><a href="#">Women Top</a></h6>
                    </div>
                    <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                        class="fa fa-star"></i><i class="fa fa-star"></i></div>
                    <div class="price d-flex">
                      <div class="text-muted me-2">Price</div>: 210
                    </div>
                    <div class="avaiabilty">
                      <div class="text-success">In stock</div>
                    </div><a class="btn btn-success btn-xs" href="#">Shipped</a><i class="close" data-feather="x"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-4 col-md-6">
              <div class="prooduct-details-box">
                <div class="media"><img class="align-self-center img-fluid img-60"
                    src="/assets/images/ecommerce/product-table-5.png" alt="#">
                  <div class="media-body ms-3">
                    <div class="product-name">
                      <h6><a href="#">Women Shorts</a></h6>
                    </div>
                    <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                        class="fa fa-star"></i><i class="fa fa-star"></i></div>
                    <div class="price d-flex">
                      <div class="text-muted me-2">Price</div>: 210
                    </div>
                    <div class="avaiabilty">
                      <div class="text-success">In stock</div>
                    </div><a class="btn btn-success btn-xs" href="#">Shipped</a><i class="close" data-feather="x"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-4 col-md-6">
              <div class="prooduct-details-box">
                <div class="media"><img class="align-self-center img-fluid img-60"
                    src="/assets/images/ecommerce/product-table-4.png" alt="#">
                  <div class="media-body ms-3">
                    <div class="product-name">
                      <h6><a href="#">Cyclamen</a></h6>
                    </div>
                    <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                        class="fa fa-star"></i><i class="fa fa-star"></i></div>
                    <div class="price d-flex">
                      <div class="text-muted me-2">Price</div>: 210
                    </div>
                    <div class="avaiabilty">
                      <div class="text-success">In stock</div>
                    </div><a class="btn btn-success btn-xs" href="#">Shipped</a><i class="close" data-feather="x"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h5>Cancelled Orders</h5>
        </div>
        <div class="card-body">
          <div class="row g-sm-4 g-3">
            <div class="col-xxl-4 col-md-6">
              <div class="prooduct-details-box">
                <div class="media"><img class="align-self-center img-fluid img-60"
                    src="/assets/images/ecommerce/product-table-6.png" alt="#">
                  <div class="media-body ms-3">
                    <div class="product-name">
                      <h6><a href="#">Women Top</a></h6>
                    </div>
                    <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                        class="fa fa-star"></i><i class="fa fa-star"></i></div>
                    <div class="price d-flex">
                      <div class="text-muted me-2">Price</div>: 210
                    </div>
                    <div class="avaiabilty">
                      <div class="text-success">In stock</div>
                    </div><a class="btn btn-danger btn-xs" href="#">Cancelled</a><i class="close" data-feather="x"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-4 col-md-6">
              <div class="prooduct-details-box">
                <div class="media"><img class="align-self-center img-fluid img-60"
                    src="/assets/images/ecommerce/product-table-5.png" alt="#">
                  <div class="media-body ms-3">
                    <div class="product-name">
                      <h6><a href="#">Women Shorts</a></h6>
                    </div>
                    <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                        class="fa fa-star"></i><i class="fa fa-star"></i></div>
                    <div class="price d-flex">
                      <div class="text-muted me-2">Price</div>: 210
                    </div>
                    <div class="avaiabilty">
                      <div class="text-success">In stock</div>
                    </div><a class="btn btn-danger btn-xs" href="#">Cancelled</a><i class="close" data-feather="x"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-4 col-md-6">
              <div class="prooduct-details-box">
                <div class="media"><img class="align-self-center img-fluid img-60"
                    src="/assets/images/ecommerce/product-table-4.png" alt="#">
                  <div class="media-body ms-3">
                    <div class="product-name">
                      <h6><a href="#">Cyclamen</a></h6>
                    </div>
                    <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                        class="fa fa-star"></i><i class="fa fa-star"></i></div>
                    <div class="price d-flex">
                      <div class="text-muted me-2">Price</div>: 210
                    </div>
                    <div class="avaiabilty">
                      <div class="text-success">In stock</div>
                    </div><a class="btn btn-danger btn-xs" href="#">Cancelled</a><i class="close" data-feather="x"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
                  <th scope="col">Prdouct</th>
                  <th scope="col">Prdouct name</th>
                  <th scope="col">Size</th>
                  <th scope="col">Color</th>
                  <th scope="col">Article number</th>
                  <th scope="col">Units</th>
                  <th scope="col">Price</th>
                  <th scope="col"><i class="fa fa-angle-down"></i></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><img class="img-fluid img-30" src="/assets/images/product/13.png" alt="#"></td>
                  <td>
                    <div class="product-name"><a href="#">Fancy watch</a>
                      <div class="order-process"><span class="order-process-circle"></span>Processing</div>
                    </div>
                  </td>
                  <td>35mm</td>
                  <td>Blue</td>
                  <td>5476182</td>
                  <td>1</td>
                  <td>10</td>
                  <td><i data-feather="more-vertical"></i></td>
                </tr>
                <tr>
                  <td><img class="img-fluid img-30" src="/assets/images/product/10.png" alt="#"></td>
                  <td>
                    <div class="product-name"><a href="#">Ledis side bag</a>
                      <div class="order-process"><span class="order-process-circle shipped-order"></span>Shipped</div>
                    </div>
                  </td>
                  <td>22cm x 18cm</td>
                  <td>Brown</td>
                  <td>7451725</td>
                  <td>1</td>
                  <td>13</td>
                  <td><i data-feather="more-vertical"></i></td>
                </tr>
                <tr>
                  <td><img class="img-fluid img-30" src="/assets/images/product/15.png" alt="#"></td>
                  <td>
                    <div class="product-name"><a href="#">Iphone6 mobile</a>
                      <div class="order-process"><span class="order-process-circle cancel-order"></span>Cancelled</div>
                    </div>
                  </td>
                  <td>10cm x 15cm</td>
                  <td>Black</td>
                  <td>5748214</td>
                  <td>1</td>
                  <td>25</td>
                  <td><i data-feather="more-vertical"></i></td>
                </tr>
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