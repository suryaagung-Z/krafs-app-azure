<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
{
    protected $path;
    public function __construct()
    {
        $this->path = "apps.product-categories.";
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::all();
        return view($this->path . 'list-product-category', [
            "categories" => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->path . 'add-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => ['required']
        ]);

        $name = strtolower($valid->validated()['name']);

        $existsCtg = ProductCategory::where('name', $name)->first();
        if ($existsCtg || ($existsCtg != null)) {
            return redirect()->route('product-category.index')->with('warning', 'Category not available');
        }

        $store = new ProductCategory();
        $store->name = $name;
        if ($store->save()) {
            return redirect()->route('product-category.index')->with('success', 'Category successfully added');
        } else {
            return redirect()->route('product-category.index')->with('warning', 'Failed to add category');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        return view($this->path . 'update-category', [
            "category" => $productCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        $valid = Validator::make($request->all(), [
            "name" => ['required']
        ]);

        $name = strtolower($valid->validated()['name']);

        $existsCtg = ProductCategory::where('name', $name)->first();
        if ($existsCtg || ($existsCtg != null)) {
            return back()->with('warning', 'Category not available');
        }

        $productCategory->name = $name;
        if ($productCategory->save()) {
            return redirect()->route('product-category.index')->with('success', 'Category successfully updated');
        } else {
            return redirect()->route('product-category.index')->with('warning', 'Failed to update category');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        if ($productCategory->forceDelete()) {
            return redirect()->route('product-category.index')->with('success', 'Category successfully deleted');
        } else {
            return redirect()->route('product-category.index')->with('warning', 'Failed to delete category');
        }
    }
}
