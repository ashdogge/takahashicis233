<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsGet extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $sortBy = $request->query('sortBy') ?? 'name';
        $direction = $request->query('direction') ?? 'asc';
        $products = Product::orderBy($sortBy, $direction)->get();
        return response()->json(['products' => $products], 200);
    }
}
