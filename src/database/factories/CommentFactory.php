<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 20),
            'product_id' => $this->faker->numberBetween(1, 19),
            'comment' => $this->faker->realText($maxNbChars = 100),
        ];
    }
}
