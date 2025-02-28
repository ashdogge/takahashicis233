<?php
namespace App\Models\Validators;

use Illuminate\Support\Facades\Validator;

class ProductValidator
{
    public static function validate($data)
    {
       return Validator::make($data, [
            'name' => 'required|string|max:255',
            'price' => 'required|string',
            'description' => 'nullable|string',
            'item_number' => 'required|integer',
            'image' => 'nullable|url',
        ])->validate();
    }
}