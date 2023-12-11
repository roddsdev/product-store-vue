<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Domain\UseCases\Category\DestroyCategory;
use App\Domain\UseCases\Category\ListCategories;
use App\Domain\UseCases\Category\StoreCategory;
use App\Domain\UseCases\Category\UpdateCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $table = ListCategories::execute($request->all());

        return Inertia::render('Categories/indexCategories', compact('table'));
    }

    public function create()
    {
        return Inertia::render('Categories/createCategories');
    }

    public function store(StoreCategoryRequest $request)
    {
        StoreCategory::execute($request->all());

        return to_route('categories.index');
    }

    public function show(Category $category)
    {
        $category->load('products');

        return Inertia::render('Categories/showCategories', compact('category'));
    }

    public function edit(Category $category)
    {
        return Inertia::render('Categories/editCategories', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        UpdateCategory::execute($request->all(), $category);

        return to_route('categories.index');
    }

    public function destroy(Category $category)
    {
        DestroyCategory::execute($category);

        return to_route('categories.index');
    }
}
