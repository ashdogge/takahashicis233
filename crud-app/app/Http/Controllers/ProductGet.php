<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\Response;

class ProductGet extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $product = Product::find($id);

        return response()->json(['product' => $product]);
    }
}
