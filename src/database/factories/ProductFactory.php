<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition()
    {
        return [
            'seller_id' => 1,
            'buyer_id' => 1,
            'condition_id' => 1,
            'brand_id' => 1,
            'name' => $this->faker->word(),
            'image_path' => 'test.jpg',
            'price' => '1000',
            'description' => '玄界灘でとれたおいしいキャビアです。',
        ];
    }
}
