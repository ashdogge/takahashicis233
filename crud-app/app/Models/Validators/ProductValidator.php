<?php
namespace App\Models\Validators;

use Illuminate\Support\Facades\Validator;

class ProductValidator
{
    public static function validate($data, $verb)
    {
        $idRule = 'integer';

        if ($verb === 'put') {
            $idRule = 'required|integer';
        }
        ;
        return Validator::make($data, [
            'id' => $idRule,
            'name' => 'required|string|max:255',
            'price' => 'required|string',
            'description' => 'nullable|string',
            'item_number' => 'required|integer',
            'image' => 'nullable|url',
        ])->validate();
    }
}