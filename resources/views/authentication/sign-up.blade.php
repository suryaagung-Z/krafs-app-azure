@extends('layouts.authentication.master')
@section('title', 'Sign up')

@section('css')
@endsection

@section('style')
@endsection


@section('content')
@if(session('success'))
<div class="alert alert-success">
   {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
   {{ session('error') }}
</div>
@endif
<div class="container-fluid">
   <div class="row">
      <div class="col-12 p-0">
         <div>
            <div class="theme-form">
               <form action="{{ route('sign-up.store') }}" method="post" id="form-wizard">
                  @csrf
                  <div class="wizard-4" id="wizard">

                     <ul>
                        <li>
                           <a class="logo text-start ps-0" href="{{ route('/') }}">
                              <img class="img-fluid for-light" src="/assets/images/logo/logo.png" alt="looginpage">
                              <img class="img-fluid for-dark" src="/assets/images/logo/logo_dark.png" alt="looginpage">
                           </a>
                        </li>
                        <li>
                           <a href="#step-1">
                              <h4>1</h4>
                              <h5>personal</h5>
                              <small>Add personal details</small>
                           </a>
                        </li>
                        <li>
                           <a href="#step-2">
                              <h4>2</h4>
                              <h5>Address</h5>
                              <small>Add additional info</small>
                           </a>
                        </li>
                        <li>
                           <a href="#step-3">
                              <h4>3</h4>
                              <h5>Message</h5>
                              <small>Add message(optional)</small>
                           </a>
                        </li>
                        <li class="pb-0">
                           <a href="#step-4">
                              <h4>4</h4>
                              <h5> Done <i class="fa fa-thumbs-o-up"></i></h5>
                              <small>Complete.. !</small>
                           </a>
                        </li>
                        <li><img src="/assets/images/login/icon.png" alt="looginpage"></li>
                     </ul>

                     <div id="step-1">
                        <div class="wizard-title">
                           <h2>Sign up to account</h2>
                           <h5 class="text-muted mb-4">Enter your email & password to login</h5>
                        </div>
                        <div class="login-main">
                           <div class="theme-form">
                              <div class="form-group mb-3">
                                 <label for="name">Full Name</label>
                                 <input class="form-control" id="name" type="text" placeholder="Full name"
                                    required="required" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
                                 @error('nama_lengkap')
                                 <small class="text-danger">{{ $message }}</small>
                                 @enderror
                              </div>
                              <div class="form-group mb-3">
                                 <label for="lname">Username</label>
                                 <input class="form-control" id="lname" type="text" placeholder="Username"
                                    name="username" value="{{ old('username') }}">
                                 @error('username')
                                 <small class="text-danger">{{ $message }}</small>
                                 @enderror
                              </div>
                              <div class="form-group mb-3">
                                 <label for="contact">Contact No.</label>
                                 <input class="form-control" id="contact" type="number" placeholder="123456789"
                                    name="notelp" value="{{ old('notelp') }}">
                                 @error('notelp')
                                 <small class="text-danger">{{ $message }}</small>
                                 @enderror
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="step-2">
                        <div class="wizard-title">
                           <h2>Sign up to account</h2>
                           <h5 class="text-muted mb-4">Enter your email & password to login</h5>
                        </div>
                        <div class="login-main">
                           <div class="theme-form">
                              <div class="form-group mb-3 m-t-15">
                                 <label for="exampleFormControlInput1">Email address</label>
                                 <input class="form-control" id="exampleFormControlInput1" type="email"
                                    placeholder="name@example.com" name="email" value="{{ old('email') }}">
                                 @error('email')
                                 <small class="text-danger">{{ $message }}</small>
                                 @enderror
                              </div>
                              <div class="form-group mb-3">
                                 <label for="exampleInputPassword1">Password</label>
                                 <input class="form-control" id="exampleInputPassword1" type="password"
                                    placeholder="Password" name="password" value="{{ old('password') }}">
                                 @error('password')
                                 <small class="text-danger">{{ $message }}</small>
                                 @enderror
                              </div>
                              <div class="form-group mb-3">
                                 <label for="exampleInputPassword1">Confirm Password</label>
                                 <input class="form-control" id="exampleInputcPassword1" type="password"
                                    placeholder="Enter again" name="confirm_password"
                                    value="{{ old('confirm_password') }}">
                                 @error('confirm_password')
                                 <small class="text-danger">{{ $message }}</small>
                                 @enderror
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="step-3">
                        <div class="wizard-title">
                           <h2>Sign up to account</h2>
                           <h5 class="text-muted mb-4">Enter your email & password to login</h5>
                        </div>
                        <div class="login-main">
                           <div class="theme-form">
                              <div class="form-group mb-3">
                                 <label for="exampleFormControlInput1">Birthday:</label>
                                 <input class="form-control" type="date" name="tgl_lahir"
                                    value="{{ old('tgl_lahir') }}">
                                 @error('tgl_lahir')
                                 <small class="text-danger">{{ $message }}</small>
                                 @enderror
                              </div>
                              <div class="form-group mb-3">
                                 <label class="control-label">Age</label>
                                 <input class="form-control" placeholder="Age" type="text" name="usia"
                                    value="{{ old('usia') }}">
                                 @error('usia')
                                 <small class="text-danger">{{ $message }}</small>
                                 @enderror
                              </div>
                              <div class="form-group mb-3">
                                 <label class="control-label">Country</label>
                                 <input class="form-control" placeholder="Country" type="text" name="negara"
                                    value="{{ old('negara') }}">
                                 @error('negara')
                                 <small class="text-danger">{{ $message }}</small>
                                 @enderror
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="step-4">
                        <div class="wizard-title">
                           <h2>Sign up to account</h2>
                           <h5 class="text-muted mb-4">Enter your email & password to login</h5>
                        </div>
                        <div class="login-main">
                           <div class="theme-form">
                              <div class="form-group mb-3">
                                 <label class="control-label">State</label>
                                 <input class="form-control mt-1" type="text" placeholder="State" required="required"
                                    name="provinsi" value="{{ old('provinsi') }}">
                                 @error('provinsi')
                                 <small class="text-danger">{{ $message }}</small>
                                 @enderror
                              </div>
                              <div class="form-group mb-3">
                                 <label class="control-label">City</label>
                                 <input class="form-control mt-1" type="text" placeholder="City" required="required"
                                    name="kota" value="{{ old('kota') }}">
                                 @error('kota')
                                 <small class="text-danger">{{ $message }}</small>
                                 @enderror
                              </div>
                              <div class="form-group mb-3">
                                 <label class="control-label">Address details</label>
                                 <input class="form-control mt-1" type="text" placeholder="street/block/house number"
                                    required="required" name="alamat_lengkap" value="{{ old('alamat_lengkap') }}">
                                 @error('alamat_lengkap')
                                 <small class="text-danger">{{ $message }}</small>
                                 @enderror
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
<script src="/assets/js/form-wizard/form-wizard-five.js"></script>
<script src="/assets/js/tooltip-init.js"></script>
<script src="/assets/js/theme-customizer/customizer.js"></script>
@endsection