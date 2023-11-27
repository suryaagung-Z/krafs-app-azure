<?php

namespace App\Http\Controllers;

use App\Http\Middleware\IsAdmin;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    protected $pathUser, $pathAdmin;

    public function __construct()
    {
        $this->pathUser = "apps.product.user.";
        $this->pathAdmin = "apps.product.admin.";

        $this->middleware(['admin', 'auth'])->only(['create', 'store', 'edit', 'update', 'destroy']);
        // $this->middleware('customer')->only('show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        if (Auth::check()) {
            $userRole = Auth::user()->role_id;

            if ($userRole == '1') {
                return view($this->pathAdmin . "list-products", compact('products'));
            }
        }

        return view($this->pathUser . "product", compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->pathAdmin . 'add-product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view($this->pathUser . 'product-page', ["product" => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
