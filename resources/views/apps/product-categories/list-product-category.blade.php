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
<h3>Product Categories</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Ecommerce</li>
<li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <h5 class="mb-3">Manage your product categories 📦</h5>
              <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse cum velit fuga distinctio quaerat
                neque quam repudiandae delectus. Doloribus, nisi!</span>
            </div>
            <div class="col-auto">
              <a class="btn btn-pill btn-primary btn-air-primary" data-bs-original-title="" title=""
                href="{{route('product-category.create')}}">Add
                Category</a>
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
                  <th>calc products</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $ctg)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $ctg->name }}</td>
                  <td>{{ $ctg->products->count() }}</td>
                  <td>
                    <div class="d-flex gap-2">
                      @if ($ctg->products->count() == 0)
                      <form action="{{ route('product-category.destroy', $ctg->_id) }}" method="POST" id="delCtg">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-xs" type="submit" data-original-title="btn btn-danger btn-xs"
                          title="">Delete</button>
                      </form>
                      @else
                      <button class="btn btn-danger btn-xs disabled" type="button"
                        data-original-title="btn btn-danger btn-xs" title="">Cannot Delete</button>
                      @endif
                      <button type="button" class="btn btn-success btn-xs" data-original-title="btn btn-danger btn-xs"
                        title="" id="editCtg" data-href="{{ route('product-category.edit', $ctg->_id) }}">Edit</button>
                    </div>
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

    $('form#delCtg').submit(function(e){
      e.preventDefault();
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
          $(this).unbind('submit').submit();
        }
      });
    });

    $('button#editCtg').click(function(){
      window.location.href = $(this).data('href');
    });
  })();
</script>
@endsection