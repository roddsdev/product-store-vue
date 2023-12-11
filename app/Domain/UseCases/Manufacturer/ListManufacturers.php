<?php

namespace App\Domain\UseCases\Manufacturer;

use App\Models\Manufacturer;

class ListManufacturers
{
    public static function execute($data)
    {
        $table = Manufacturer::search($data)->orderBy('id', 'desc')->paginate(10)->appends($data);

        return $table;
    }
}