@extends('layouts.simple.master')
@section('title', 'Checkout')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Checkout</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Ecommerce</li>
<li class="breadcrumb-item active">Checkout</li>
@endsection

@section('content')
<div class="container-fluid checkout">
   <div class="card">
      <div class="card-header">
         <h5>Billing Details</h5>
      </div>
      <form action="" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
         @csrf
         <div class="card-body">
            <div class="row">
               <div class="col-xl-6 col-sm-12">
                  <div class="row">
                     <div class="mb-3 col-12">
                        <label for="fullname">Full Name</label>
                        <input class="form-control" id="fullname" type="text" placeholder="Full Name"
                           value="{{ $dataUser->customer->fullName }}" name="fullName">
                     </div>
                     <div class="col-sm-5">
                        <div class="mb-3">
                           <label class="form-label">Phone</label>
                           <input class="form-control" type="number" placeholder="Phone" name="phone"
                              value="{{ $dataUser->customer->phone }}" required>
                           <div class="invalid-feedback text-danger">
                              Please provide a valid phone.
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="mb-3">
                           <label class="form-label">Country</label>
                           <select class="form-control btn-square" name="country" required>
                              {{-- <option selected disabled>--Select--</option> --}}
                              <option value="indonesia" selected>Indonesia</option>
                           </select>
                           <div class="invalid-feedback text-danger">
                              Please provide a valid country.
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="mb-3">
                           <label class="form-label">State</label>
                           <select class="form-control btn-square" name="state" required>
                           </select>
                           <div class="invalid-feedback text-danger">
                              Please provide a valid state.
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="mb-3">
                           <label class="form-label">City</label>
                           <select class="form-control btn-square" name="city" required>
                           </select>
                           <div class="invalid-feedback text-danger">
                              Please provide a valid city.
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="mb-3">
                           <label class="form-label">Districts</label>
                           <select class="form-control btn-square" name="districts" required>
                           </select>
                           <div class="invalid-feedback text-danger">
                              Please provide a valid districts.
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="mb-3">
                           <label class="form-label">Sub Districts</label>
                           <select class="form-control btn-square" name="subDistricts" required>
                           </select>
                           <div class="invalid-feedback text-danger">
                              Please provide a valid sub districts.
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="mb-3">
                           <label class="form-label">Postal Code</label>
                           <select class="form-control btn-square" name="zipCode" required>
                           </select>
                           <div class="invalid-feedback text-danger">
                              Please provide a valid postal code.
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-8">
                        <div class="mb-3">
                           <label class="form-label">Detail Address</label>
                           <input class="form-control" type="text" placeholder="House/Office/Apartment"
                              value="{{ $dataUser->customer->detailAddress }}" name="detailAddress" required>
                           <div class="invalid-feedback text-danger">
                              Please provide a valid detail address.
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-6 col-sm-12">
                  <div class="checkout-details">
                     <div class="order-box">
                        <div class="title-box">
                           <div class="checkbox-title">
                              <h4>Product </h4>
                              <span>Total</span>
                           </div>
                        </div>
                        <ul class="qty">
                           @php
                           $subtotal = 0;
                           @endphp
                           @foreach ($dataCheckout as $key => $data)
                           <li><b>{{ $data->product->name }}</b> × {{ $data->quantity }}
                              <span>Rp. {{ $data->product->price * $data->quantity }}</span>
                              <input type="hidden" name="products[{{$key}}][product_id]" value="{{$data->product_id}}">
                              <input type="hidden" name="products[{{$key}}][quantity]" value="{{$data->quantity}}">
                           </li>
                           @php
                           $subtotal += $data->product->price * $data->quantity
                           @endphp
                           @endforeach
                        </ul>
                        <ul class="sub-total">
                           <li>Subtotal <span class="count">Rp. {{ $subtotal }}</span></li>
                           <li>Shipping <span class="count">Rp. 0</span></li>
                        </ul>
                        <ul class="sub-total total">
                           <li>Total <span class="count">Rp. {{ $subtotal }}</span></li>
                        </ul>
                        <div class="animate-chk">
                           <div class="row">
                              <div class="col-12 col-sm-6 mb-3 mb-sm-0">
                                 @foreach ($paymentMethod as $pm)
                                 <label class="d-block" for="edo-ani-{{$loop->iteration}}">
                                    <input class="radio_animated" id="edo-ani-{{$loop->iteration}}" type="radio"
                                       name="payMethod" data-original-title="" title="" value="{{$pm->_id}}" required>
                                    <img src="{{ asset('assets/images/payment-method'.'/'.$pm->icon)}}" alt=""
                                       width="35">
                                    <small>({{$pm->number}})</small>
                                 </label>
                                 @endforeach
                              </div>
                              <div class="col-12 col-sm-6">
                                 <label for="formFileSm" class="form-label">Bukti pembayaran</label>
                                 <input class="form-control form-control-sm" id="formFileSm" type="file" required
                                    name="proofPayment">
                              </div>
                           </div>
                        </div>
                        <div class="order-place">
                           <button class="btn btn-primary" type="submit">Place Order</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection

@section('script')
<script lang="javascript">
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

<script>
   (function(){
     const customerData = @json($dataUser->customer);
 
     const stateSelect = $(`select[name="state"]`);
     const citySelect = $(`select[name="city"]`);
     const districtsSelect = $(`select[name="districts"]`);
     const subdistrictsSelect = $(`select[name="subDistricts"]`);
     const zipCodeSelect = $(`select[name="zipCode"]`);
 
     // Function to fetch data from API
     function fetchData(url) {
       return new Promise(function(resolve, reject) {
         $.ajax({
           url: url,
           method: "GET",
           success: function(data) {
             resolve(data);
           },
           error: function(xhr, status, error) {
            alert('Check your internet connection');
            reject(error);
           }
         });
       });
     }
 
     // Function to populate the state dropdown
     async function populateStateDropdown() {
       try {
         const provincesData = await fetchData("https://alamat.thecloudalert.com/api/provinsi/get/");
         const provinces = provincesData.result;
 
         // Clear previous options
         stateSelect.empty();
         citySelect.empty();
         districtsSelect.empty();
         subdistrictsSelect.empty();
         zipCodeSelect.empty();
 
         stateSelect.append(`<option selected disabled>--Select--</option>`);
         // Populate dropdown with provinces
         provinces.forEach(province => {
           stateSelect.append(`<option value="${province.id}">${province.text}</option>`);
         });
 
         stateSelect.val(customerData.state);
         if (customerData.state) {
             setTimeout(function() {
                 stateSelect.change();
             }, 0);
         }
 
         // Trigger the city dropdown population when a state is selected
         stateSelect.on("change", function() {
           const selectedProvinceId = $(this).val();
           if (selectedProvinceId) {
             populateCityDropdown(selectedProvinceId);
           } else {
             // Clear options in dependent dropdowns if the current dropdown is cleared
             citySelect.empty();
             districtsSelect.empty();
             subdistrictsSelect.empty();
             zipCodeSelect.empty();
           }
         });
 
       } catch (error) {
         console.error(error);
       }
     }
 
     // Function to populate the city dropdown
     async function populateCityDropdown(provinceId) {
       try {
         const citiesData = await fetchData(`https://alamat.thecloudalert.com/api/kabkota/get/?d_provinsi_id=${provinceId}`);
         const cities = citiesData.result;
 
         // Clear previous options
         citySelect.empty();
         districtsSelect.empty();
         subdistrictsSelect.empty();
         zipCodeSelect.empty();
 
         citySelect.append(`<option selected disabled>--Select--</option>`);
         // Populate dropdown with cities
         cities.forEach(city => {
           citySelect.append(`<option value="${city.id}">${city.text}</option>`);
         });
 
         citySelect.val(customerData.city);
         if (customerData.city) {
             setTimeout(function() {
                 citySelect.change();
             }, 0);
         }
 
         // Trigger the districts dropdown population when a city is selected
         citySelect.on("change", function() {
           const selectedCityId = $(this).val();
           if (selectedCityId) {
             populateDistrictsDropdown(selectedCityId);
           } else {
             // Clear options in dependent dropdowns if the current dropdown is cleared
             districtsSelect.empty();
             subdistrictsSelect.empty();
             zipCodeSelect.empty();
           }
         });
 
       } catch (error) {
         console.error(error);
       }
     }
 
     // Function to populate the districts dropdown
     async function populateDistrictsDropdown(cityId) {
       try {
         const districtsData = await fetchData(`https://alamat.thecloudalert.com/api/kecamatan/get/?d_kabkota_id=${cityId}`);
         const districts = districtsData.result;
 
         // Clear previous options
         districtsSelect.empty();
         subdistrictsSelect.empty();
         zipCodeSelect.empty();
 
         districtsSelect.append(`<option selected disabled>--Select--</option>`);
         // Populate dropdown with districts
         districts.forEach(district => {
           districtsSelect.append(`<option value="${district.id}">${district.text}</option>`);
         });
 
         districtsSelect.val(customerData.districts);
         if (customerData.districts) {
             setTimeout(function() {
               districtsSelect.change();
             }, 0);
         }
 
         // Trigger the subdistricts dropdown population when a district is selected
         districtsSelect.on("change", function() {
           const selectedDistrictId = $(this).val();
           if (selectedDistrictId) {
             populateSubdistrictsDropdown(selectedDistrictId);
           } else {
             // Clear options in dependent dropdowns if the current dropdown is cleared
             subdistrictsSelect.empty();
             zipCodeSelect.empty();
           }
         });
 
       } catch (error) {
         console.error(error);
       }
     }
 
     // Function to populate the subdistricts dropdown
     async function populateSubdistrictsDropdown(districtId) {
       try {
         const subdistrictsData = await fetchData(`https://alamat.thecloudalert.com/api/kelurahan/get/?d_kecamatan_id=${districtId}`);
         const subdistricts = subdistrictsData.result;
 
         // Clear previous options
         subdistrictsSelect.empty();
         zipCodeSelect.empty();
 
         subdistrictsSelect.append(`<option selected disabled>--Select--</option>`);
         // Populate dropdown with subdistricts
         subdistricts.forEach(subdistrict => {
           subdistrictsSelect.append(`<option value="${subdistrict.id}">${subdistrict.text}</option>`);
         });
 
         subdistrictsSelect.val(customerData.subDistricts);
         if (customerData.subDistricts) {
             setTimeout(function() {
               subdistrictsSelect.change();
             }, 0);
         }
 
         // Trigger the zip code dropdown population when a subdistrict is selected
         subdistrictsSelect.on("change", function() {
           const selectedSubdistrictId = $(this).val();
           if (selectedSubdistrictId) {
             populateZipCodeDropdown();
           } else {
             // Clear options in dependent dropdowns if the current dropdown is cleared
             zipCodeSelect.empty();
           }
         });
 
       } catch (error) {
         console.error(error);
       }
     }
 
     // Function to populate the zip code dropdown
     async function populateZipCodeDropdown() {
       try {
         const zipCodesData = await fetchData(`https://alamat.thecloudalert.com/api/kodepos/get/?d_kabkota_id=${citySelect.val()}&d_kecamatan_id=${districtsSelect.val()}`);
         const zipCodes = zipCodesData.result;
 
         // Clear previous options
         zipCodeSelect.empty();
 
         zipCodeSelect.append(`<option selected disabled>--Select--</option>`);
         // Populate dropdown with zip codes
         zipCodes.forEach(zip => {
           zipCodeSelect.append(`<option value="${zip.id}">${zip.text}</option>`);
         });
 
         zipCodeSelect.val(customerData.zipCode);
         if (customerData.zipCode) {
             setTimeout(function() {
               zipCodeSelect.change();
             }, 0);
         }
 
       } catch (error) {
         console.error(error);
       }
     }
 
     // Initial data population
     populateStateDropdown();
   })();
</script>
@endsection