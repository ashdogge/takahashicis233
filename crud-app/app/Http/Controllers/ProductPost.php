<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Validators\ProductValidator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class ProductPost extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try {
            $data = $request->all();
            //Validate the data with new validator
            $validatedData = ProductValidator::validate($data, 'post');
            //Create the new product
            $product = Product::create($validatedData);
            return response()->json(['product' => $product], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error: Missing or Invalid field'], 400);
        }
    }
}
