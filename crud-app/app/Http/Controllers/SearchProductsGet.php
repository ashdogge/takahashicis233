<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class SearchProductsGet extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //try/catch for catching errors
        try {
            //assign 'query' parameter from request
            $query = $request->query('q');
            //Check that query was passed
            if ($query) {
                //Use the search functinon from the product class
                $products = Product::search($query)->get();
            } else {
                return response()->json(['error' => 'Empty query string'], 400);
            }


            return response()->json($products, 200);
        } catch (\Exception $e) {
            response()->json(['message' => 'Error retrieving search'], 400);
        }

    }
}
