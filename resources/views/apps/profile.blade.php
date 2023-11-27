@extends('layouts.simple.master')
@section('title', 'Profile')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Profile</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item active">Profile</li>
@endsection

@section('content')
<div class="container-fluid">
  <div class="edit-profile">
    <div class="row">
      <div class="col-xl-4">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">My Profile</h4>
            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i
                  class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#"
                data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
          </div>
          <div class="card-body">
            <form>
              <div class="row mb-2">
                <div class="profile-title">
                  <div class="media"><img class="img-70 rounded-circle" alt="" src="{{ $data->profile_image }}">
                    <div class="media-body">
                      <h5 class="mb-1">{{ $data->username }}</h5>
                      <p>{{ $data->role->name }}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label">Email-Address</label>
                <input class="form-control" placeholder="your-email@domain.com" disabled value="{{ $data->email }}">
              </div>
              <div class=" form-footer">
                <a class="btn btn-square btn-light py-1 px-3" type="button" href="https://myaccount.google.com/"
                  target="_blank">
                  <small>Manage Google Account</small>
                  <img src="/assets/images/svg-icon/google.svg" alt="google logo" class="img-20 rounded-circle">
                </a>
                {{-- <button class="btn btn-primary btn-block disabled">Save</button> --}}
              </div>
            </form>
          </div>
        </div>
      </div>
      @if (auth()->user()->role_id == 2)
      <div class="col-xl-8">
        <form method="POST" action="{{ route('profile.update', $data->_id) }}" class="card needs-validation" novalidate>
          @method("PUT")
          @csrf
          <div class="card-header">
            <h4 class="card-title mb-0">Edit Detail Profile</h4>
            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i
                  class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#"
                data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Full Name</label>
                  <input class="form-control" type="text" placeholder="Full Name"
                    value="{{ $data->customer->fullName }}" name="fullName" required>
                  <div class="invalid-feedback text-danger">
                    Please provide a valid fullname.
                  </div>
                </div>
              </div>
              <div class="col-sm-5 col-md-2">
                <div class="mb-3">
                  <label class="form-label">Age</label>
                  <input class="form-control" type="number" placeholder="Age" value="{{ $data->customer->age }}"
                    name="age" required>
                  <div class="invalid-feedback text-danger">
                    Please provide a valid age.
                  </div>
                </div>
              </div>
              <div class="col-sm-7 col-md-4">
                <div class="mb-3">
                  <label class="form-label">Birthday</label>
                  <input class="form-control" type="date" placeholder="Birthday" value="{{ $data->customer->birthday }}"
                    name="birthday" required>
                  <div class="invalid-feedback text-danger">
                    Please provide a valid birthday.
                  </div>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="mb-3">
                  <label class="form-label">Phone</label>
                  <input class="form-control" type="number" placeholder="Phone" value="{{ $data->customer->phone }}"
                    name="phone" required>
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
                    {{-- {{ $data->customer->state }} --}}
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
                    {{-- {{ $data->customer->city }} --}}
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
                    {{-- {{ $data->customer->districts }} --}}
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
                    {{-- {{ $data->customer->subDistricts }} --}}
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
                    {{-- {{ $data->customer->zipCode }} --}}
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
                    value="{{ $data->customer->detailAddress }}" name="detailAddress" required>
                  <div class="invalid-feedback text-danger">
                    Please provide a valid detail address.
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-end">
            <button class="btn btn-primary" type="submit">Update Profile</button>
          </div>
        </form>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection

@section('script')
@if (auth()->user()->role_id == 2)
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

<script>
  (function(){
    const customerData = @json($data->customer);
    // console.log(customerData);return;

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
@endif
@endsection