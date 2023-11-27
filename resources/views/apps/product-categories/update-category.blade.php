@extends('layouts.simple.master')
@section('title', 'Edit Category')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Edit Category</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Ecommerce</li>
<li class="breadcrumb-item">Categories</li>
<li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-3">Edit Category 📝</h5>
                    <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse cum velit fuga distinctio
                        quaerat
                        neque quam repudiandae delectus. Doloribus, nisi!</span>
                </div>
                <form method="POST" action="{{ route('product-category.update', $category->_id) }}"
                    class="theme-form needs-validation" novalidate>
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="name">Category Name</label>
                            <input class="form-control" id="name" type="text" placeholder="Category Name" name="name"
                                required value="{{$category->name}}">
                            <div class="invalid-feedback text-danger">
                                Please provide a valid category name.
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <a class="btn btn-secondary" href="{{route('product-category.index')}}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    (function () {
        'use strict'

        var forms = document.querySelectorAll('.needs-validation')

        Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
@endsection