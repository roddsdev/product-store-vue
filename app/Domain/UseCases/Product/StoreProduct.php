<?php

namespace App\Domain\UseCases\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class StoreProduct
{
    public static function execute($data)
    {
        $categories = $data['categories'];
        $newProduct = new Product($data);
        $newProduct->save();
        $newProduct->categories()->sync($categories);

        Session::flash('flash_message',[
			'msg'=>"Produto adicionado com sucesso!",
			'class'=>"alert-success"
    	]);
    }
}