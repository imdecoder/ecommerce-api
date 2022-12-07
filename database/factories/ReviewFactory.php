<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
		$faker = \Faker\Factory::create();

        return [
			'product_id' => function () {
				return Product::all()->random();
			},
            'customer' => $faker->name,
			'review' => $faker->paragraph,
			'star' => $faker->numberBetween(1, 5)
        ];
    }
}
