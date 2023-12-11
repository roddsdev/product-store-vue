<?php

namespace App\Domain\UseCases\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class UpdateProduct
{
    public static function execute($data, Product $product)
    {
        $categories = $data['categories'];
        $product->update($data);
        $product->categories()->sync($categories);

        Session::flash('flash_message',[
			'msg'=>"Produto editado com sucesso!",
			'class'=>"alert-success"
    	]);
    }
}