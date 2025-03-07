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
        //Error handling!
        if (!$product) {
            return response()->json(['error' => 'Product not found', Response::HTTP_NOT_FOUND]);
        }
        return response()->json(['product' => $product]);
    }
}
