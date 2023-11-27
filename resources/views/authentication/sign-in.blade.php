@extends('layouts.authentication.master')
@section('title', 'Sign in')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-xl-5"><img class="bg-img-cover bg-center" src="/assets/images/login/bg-login.jpg"
            alt="looginpage"></div>
      <div class="col-xl-7 p-0">
         <div class="login-card">
            <div>
               <div><a class="logo text-start" href="{{ route('/') }}"><img class="img-fluid for-light"
                        src="/assets/images/logo/logo.png" alt="looginpage"><img class="img-fluid for-dark"
                        src="/assets/images/logo/logo_dark.png" alt="looginpage"></a></div>
               <div class="login-main">
                  <form class="theme-form needs-validation" novalidate="" action="{{ route('sign-in.auth') }}"
                     method="POST">
                     @csrf
                     <h4>Sign in to account</h4>
                     <p>Enter your email & password to login</p>
                     <div class="form-group">
                        <label class="col-form-label">Email Address</label>
                        <input class="form-control" type="email" required="" placeholder="YourEmail@gmail.com"
                           name="email">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input class="form-control" type="password" required="" placeholder="*********" name="password">
                        <div class="invalid-tooltip">Please enter password.</div>
                        <div class="show-hide"><span class="show"></span></div>
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="form-group mb-0">
                        <div class="checkbox p-0">
                           <input id="checkbox1" type="checkbox">
                           <label class="text-muted" for="checkbox1">Remember password</label>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                     </div>
                     <h6 class="text-muted mt-4 or">Or Sign in with</h6>
                     <div class="social mt-4">
                        <div class="btn-showcase">
                           <a class="btn btn-light py-2" href="https://www.linkedin.com/login" target="_blank">
                              <img src="/assets/images/svg-icon/google.svg" alt="google logo" width="30px"> Google
                           </a>
                        </div>
                     </div>
                     <script>
                        (function() {
                           'use strict';
                           window.addEventListener('load', function() {
                              // Fetch all the forms we want to apply custom Bootstrap validation styles to
                              var forms = document.getElementsByClassName('needs-validation');
                              // Loop over them and prevent submission
                              var validation = Array.prototype.filter.call(forms, function(form) {
                                 form.addEventListener('submit', function(event) {
                                    if (form.checkValidity() === false) {
                                       event.preventDefault();
                                       event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                 }, false);
                              });
                           }, false);
                        })();
                     </script>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
@endsection