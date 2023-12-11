<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Domain\UseCases\Product\CreateOrEditAggregatedData;
use App\Domain\UseCases\Product\DestroyProduct;
use App\Domain\UseCases\Product\ListProducts;
use App\Domain\UseCases\Product\StoreProduct;
use App\Domain\UseCases\Product\UpdateProduct;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $table = ListProducts::execute($request->all());

        return Inertia::render('Products/indexProducts', compact('table'));
    }

    public function create()
    {
        $aggregateData = CreateOrEditAggregatedData::get();

        return Inertia::render('Products/createProducts', compact('aggregateData'));
    }

    public function store(StoreProductsRequest $request)
    {
        StoreProduct::execute($request->all());

        return to_route('products.index');
    }

    public function show(Product $product)
    {
        $product->load('categories', 'manufacturer');
        
        return Inertia::render('Products/showProducts', compact('product'));
    }

    public function edit(Product $product)
    {
        $product->load('categories');
        $aggregateData = CreateOrEditAggregatedData::get();
        
        return Inertia::render('Products/editProducts', compact('aggregateData', 'product'));
    }

    public function update(UpdateProductsRequest $request, Product $product)
    {
        UpdateProduct::execute($request->all(), $product);

        return to_route('products.index');
    }

    public function destroy(Product $product)
    {
        DestroyProduct::execute($product);

        return to_route('products.index');
    }
}
