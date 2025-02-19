<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use app\Policies\ProductPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Check that user can access admin
        if ($request->user()->cannot('accessAdmin', Product::class)) {
            return redirect()->route('products.index')->with('error', "You don't have permission to enter the Admin Zone.");
        }
        ;
        $products = Product::search(request('search'))->paginate(32);
        return view('admin.products.index', ['products' => $products]);

    }

    // "name",
    // "price",
    // "description",
    // "item_number",
    // "image",



    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot('manage', Product::class)) {
            return redirect()->route('products.index')->with('error', "You don't have permission to Create.");
        }
        ;
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
        if ($request->user()->cannot('manage', Product::class)) {
            return redirect()->route('products.index')->with('error', "You don't have permission to Create.");
        }
        ;

        //if valid
        //create new product

        Product::create($this->validateData($request));

        //return to a view

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        if ($request->user()->cannot('manage', Product::class)) {
            return redirect()->route('products.index')->with('error', "You don't have permission to enter the Admin Zone.");
        }
        ;
        $product = Product::find($id);
        return view("admin.products.show", compact("product"));

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, Request $request)
    {
        if ($request->user()->cannot('manage', Product::class)) {
            return redirect()->route('products.index')->with('error', "You don't have permission to Edit.");
        }
        ;
        return view('admin.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        if ($request->user()->cannot('manage', Product::class)) {
            return redirect()->route('products.index')->with('error', "You don't have permission to Update.");
        }
        ;

        $product->update($this->validateData($request));

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if ($request->user()->cannot('manage', Product::class)) {
            return redirect()->route('products.index')->with('error', "You don't have permission to delete.");
        }
        ;

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
