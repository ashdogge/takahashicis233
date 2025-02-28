<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ProductDelete extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found', Response::HTTP_NOT_FOUND]);
        }
        $product->delete();
        return response()->json(['message' => 'Product deleted'], Response::HTTP_OK);
    }
}
