<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition()
    {
        return [
            'user_id' => 1,
            'payment_id' => 1,
            'image_path' => 'test.jpg',
            'postcode' => 9009000,
            'address' => '東京都豊島区',
            'building' => '豊島ビル',
        ];
    }
}
