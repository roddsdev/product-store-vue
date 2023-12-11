<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Http\Requests\StoreManufacturersRequest;
use App\Http\Requests\UpdateManufacturersRequest;
use App\Domain\UseCases\Manufacturer\DestroyManufacturer;
use App\Domain\UseCases\Manufacturer\ListManufacturers;
use App\Domain\UseCases\Manufacturer\StoreManufacturer;
use App\Domain\UseCases\Manufacturer\UpdateManufacturer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ManufacturersController extends Controller
{
    public function index(Request $request)
    {
        $table = ListManufacturers::execute($request->all());

        return Inertia::render('Manufacturers/indexManufacturers', compact('table'));
    }

    public function create()
    {
        return Inertia::render('Manufacturers/createManufacturers');
    }

    public function store(StoreManufacturersRequest $request)
    {
        StoreManufacturer::execute($request->all());

        return to_route('manufacturers.index');
    }

    public function show(Manufacturer $manufacturer)
    {
        $manufacturer->load('products');

        return Inertia::render('Manufacturers/showManufacturers', compact('manufacturer'));
    }

    public function edit(Manufacturer $manufacturer)
    {
        return Inertia::render('Manufacturers/editManufacturers', compact('manufacturer'));
    }

    public function update(UpdateManufacturersRequest $request, Manufacturer $manufacturer)
    {
        UpdateManufacturer::execute($request->all(), $manufacturer);

        return to_route('manufacturers.index');
    }

    public function destroy(Manufacturer $manufacturer)
    {
        DestroyManufacturer::execute($manufacturer);

        return to_route('manufacturers.index');
    }
}
