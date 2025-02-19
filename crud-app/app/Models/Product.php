<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        "name",
        "price",
        "description",
        "item_number",
        "image",
    ];

    // $products = Product::paginate(12);
    // $search = request('search');
    // $products = Product::where('name', 'like', "%$search%")
    // ->orWhere('item_number', $search)
    // ->paginate(12);
    public static function search($search)
    {

        return self::where('name', 'like', "%$search%")
            ->orWhere('item_number', $search);
    }
}
