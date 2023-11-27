@extends('layouts.simple.master')
@section('title', 'Cart')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Cart</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Ecommerce</li>
<li class="breadcrumb-item active">Cart</li>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h5>Checkout your items now. 📦</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="order-history table-responsive wishlist">
              <table class="table table-bordered" id="checkout-table">
                <thead>
                  <tr>
                    <th>Product</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $totalPrice = 0;
                  @endphp
                  @foreach ($carts as $cart)
                  <tr>
                    <td><img class="img-fluid img-60" src="{{ $cart->product->images[0] }}" alt="#"></td>
                    <td>
                      <div class="product-name">
                        <a href="{{ route('products.show', $cart->product->_id) }}"
                          class="text-underline">{{ $cart->product->name }}</a>
                      </div>
                    </td>
                    <td>Rp. {{ $cart->product->price }}</td>
                    <td>
                      <fieldset class="qty-box">
                        <div class="input-group">
                          <input class="touchspin text-center " id="inc-qty" type="text" value="{{ $cart->quantity }}"
                            data-action="{{ route('cart.update', $cart->_id) }}">
                        </div>
                      </fieldset>
                    </td>
                    <td>
                      <i data-feather="x-circle" class="del-product"
                        data-action="{{ route('cart.destroy', $cart->_id) }}"></i>
                    </td>
                    <td>Rp. <span class="field-subtotal">{{ $cart->quantity * $cart->product->price }}</span></td>
                  </tr>
                  @php
                  $totalPrice += $cart->quantity * $cart->product->price;
                  @endphp
                  @endforeach
                  <tr>
                    <td class="total-amount" colspan="5">
                      <h6 class="m-0 text-center"><span class="f-w-600">Total Price :</span></h6>
                    </td>
                    <td><span>Rp. <span class="field-total">{{ $totalPrice }}</span></span></td>
                  </tr>
                  <tr>
                    <td class="text-end" colspan="5"><a class="btn btn-secondary cart-btn-transform"
                        href="{{ route('products.index') }}" data-bs-original-title="" title="">continue shopping</a>
                    </td>
                    <td>
                      <a class="btn btn-success cart-btn-transform {{ $carts->count() == '0' ? 'disabled' : '' }}"
                        data-bs-original-title="" title=""
                        href="{{ route('checkout.index', ['from' => 'cart', 'dck' => serialize([])]) }}">check
                        out</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- Container-fluid Ends-->
      </div>
    </div>
  </div>
</div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/touchspin/vendors.min.js') }}"></script>
<script src="{{ asset('assets/js/touchspin/touchspin.js') }}"></script>
<script src="{{ asset('assets/js/touchspin/input-groups.min.js') }}"></script>
<script lang="javascript">
  (function(){
    const checkoutTable = $('#checkout-table').first();
    const fieldTotal = $('.field-total').first();

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).on('touchspin.on.startspin', '#inc-qty', function (e) {
      const qty = e.target.value;
      const action = $(this).data('action');
      const parentTR = $(this).closest('tr');

      $.ajax({
        type: 'PUT',
        url: action,
        data: { qty },
        dataType: 'json',
        beforeSend: function() {
          checkoutTable.addClass('disabled');
        },
        success: function(response) {
          if(response.result == 0){
            showErrorToast("There has been a system error");
          }else{
            parentTR.find('.field-subtotal').html(response.subtotal);
            fieldTotal.html(response.total);
            if (response.quantity === 0) {
                parentTR.remove();
            }
          }
        },
        error: function(error) {
          showErrorToast("There has been a system error");
        },
        complete: function() {
          checkoutTable.removeClass('disabled');
        }
      });
    });

    const destroy = $('.del-product');
    destroy.click(function(){
      const action = $(this).data('action');
      const parentTR = $(this).closest('tr');

      $.ajax({
        type: 'DELETE',
        url: action,
        beforeSend: function() {
          parentTR.addClass('disabled');
        },
        success: function(response) {
          if(response.result == 0){
            showErrorToast("There has been a system error");
          }else{
            parentTR.remove();
            fieldTotal.html(response.total);
          }
        },
        error: function(error) {
          showErrorToast("There has been a system error");
        },
        complete: function() {
          parentTR.removeClass('disabled');
        }
      });
    });

    function showErrorToast(title, text = '') {
      Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: title,
        text: text,
        showConfirmButton: false,
        timer: 1500
      });
    }

  })();
</script>
@endsection