<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($type = 1)
    {
        $carts = Cart::where('user_id', Auth::id())->get();

        if ($type == 1) {
            return view('apps.cart', ['carts' => $carts]);
        } else {
            return $carts;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $id = $request->input('id');
        $quantity = $request->input('quantity');
        $getProduct = Product::find($id);

        if ($getProduct == null) {
            return back()->with('warning', 'Product not recognized');
        }

        $cart = Cart::firstOrNew([
            'user_id' => Auth::id(),
            'product_id' => $getProduct->_id,
        ]);

        if (!$cart->exists) {
            $cart->quantity = (int)$quantity;
        } else {
            $cart->quantity = (int)$cart->quantity + (int)$quantity;
        }

        if ($cart->save()) {
            return back()->with('success', 'Successfully added to cart');
        } else {
            return back()->with('warning', 'Failed to add to cart');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $init = Cart::where('_id', $id)
            ->where('user_id', Auth::id());

        $quantity = (int)$request->input('qty');
        $updateCart = $init->update(['quantity' => $quantity]);
        $thisProduct = $init->first();
        if ($quantity === 0) {
            $init->forceDelete();
        }

        $allProducts = $this->index(0);
        $totalPrice = $allProducts->sum(function ($product) {
            return $product->product->price * $product->quantity;
        });

        return response()->json([
            "result" => $updateCart,
            "price" => $thisProduct->product->price,
            "subtotal" => $thisProduct->quantity * $thisProduct->product->price,
            "total" => $totalPrice,
            "quantity" => $quantity
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destroy = Cart::where('_id', $id)->where('user_id', Auth::id())->forceDelete();
        $allProducts = $this->index(0);

        $totalPrice = $allProducts->sum(function ($product) {
            return $product->product->price * $product->quantity;
        });

        return response()->json([
            "result" => $destroy,
            "total" => $totalPrice
        ]);
    }
}
