<?php

namespace App\Domain\UseCases\Product;

use App\Models\Product;

class ListProducts
{
    public static function execute($data)
    {
        $table = Product::search($data)->with('manufacturer')->orderBy('id', 'desc')->paginate(10)->appends($data);

        return $table;
    }
}