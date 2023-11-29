<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dataCheckout = [];

        if ($request->has('from')) {
            if ($request->has('from') == 'cart') {
                $dataCheckout = Cart::where('user_id', Auth::id())->get();
            }
        }

        return view('apps.checkout', [
            "dataUser" => User::find(Auth::id()),
            "dataCheckout" => $dataCheckout,
            "paymentMethod" => PaymentMethod::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $req = $request->all();
        Validator::make($request->all(), [
            "fullName" => "required",
            "phone" => "required",
            "country" => "required",
            "state" => "required",
            "city" => "required",
            "districts" => "required",
            "subDistricts" => "required",
            "zipCode" => "required",
            "detailAddress" => "required",
            "payMethod" => "required",
            "proofPayment" => ["required", "image", "mimes:jpeg,png,jpg", "max:2048"],
        ]);

        $proof = $request->file('proofPayment');
        $proofPath = "";
        $proofPath = $proof->storePublicly('assets/images/proof-payment', 'public');

        $store = new Order();
        $store->user_id = Auth::id();
        $store->fullName = $req['fullName'];
        $store->phone = $req['phone'];
        $store->country = $req['country'];
        $store->state = $req['state'];
        $store->city = $req['city'];
        $store->districts = $req['districts'];
        $store->subDistricts = $req['subDistricts'];
        $store->zipCode = $req['zipCode'];
        $store->detailAddress = $req['detailAddress'];
        $store->zipCode = $req['zipCode'];
        $store->payment_method_id = $req['payMethod'];
        $store->products = $req['products'];
        $store->proofPayment = $proofPath;
        $store->status_order_id = 1;
        if ($store->save()) {
            $cartToDel = Cart::where('user_id', Auth::id())->get();
            $cartToDel->each->delete();
            return redirect()->route('products.index')->with('success', 'Order placed successfully');
        } else {
            return redirect()->route('products.index')->with('warning', 'Failed to place order');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
