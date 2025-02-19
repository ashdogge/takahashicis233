<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { {
            if (!auth()->check()) {
                // Load unpaginated for guest
                $products = Product::all();
            } else {
                $products = Product::search(request('search'))->paginate(32);
            }
        }
        return view("products.index", ['products' => $products]);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        if ($request->user()->cannot('manage', Product::class)) {
            return redirect()->route('products.index')->with('error', "You don't have permission to delete.");
        }
        ;
        $product = Product::find($id);
        return view("products.show", compact("product"));

    }

}
