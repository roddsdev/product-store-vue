<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dsCategory' => fake()->randomElement(['Madeira' ,'Metal', 'Aço', 'Aluminio', 'Notebook', 'Headset', 'Mouse', 'Teclado', 'Android', 'Apple', 'Microsoft', 'IOS']),
        ];
    }
}
