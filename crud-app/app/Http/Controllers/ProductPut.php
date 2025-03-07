<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Validators\ProductValidator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class ProductPut extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try {
            $data = $request->all();
            $validatedData = ProductValidator::validate($data, 'put');


            $product = Product::find($validatedData['id']);
            if (!$product) {
                return response()->json(['error' => 'Product not found', Response::HTTP_NOT_FOUND]);
            }
            $product->update($validatedData);
            return response()->json(['product' => $product], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error updating Product. Check that you are sending valid data.'], Response::HTTP_BAD_REQUEST);
        }
    }
}
