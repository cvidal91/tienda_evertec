<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->name(),
            'product_short_description' => $this->faker->text(120),
            'product_price' => $this->faker->numberBetween(1000, 90000),
            'product_url_image' => $this->faker->url . "/" . Str::random(10),
        ];
    }
}
