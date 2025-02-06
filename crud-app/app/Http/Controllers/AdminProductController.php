<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view("admin.products.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        return view("admin.products.create", ['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validate data
        //create a new product with valid data

        //If invalid, redirect back to the form with errors


        //if valid
        //create new product

        Product::create($this->validateData($request));

        //return to a view

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view("admin.products.show", compact("product"));

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //Product lookup, validate, update, and redirect, handle errors
        $product = Product::findOrFail($product); // Throws 404 if not found

        $product->update($this->validateData($request));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route("admin.products.index")->with("success", "Product destroyed successfully.");
    }

    private function validateData(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string',
            'description' => 'nullable|string',
            'item_number' => 'required|int',
            'image' => 'nullable|url',
        ]);
    }

}
