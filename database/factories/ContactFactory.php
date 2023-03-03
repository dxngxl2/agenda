<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContactFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->firstName(),
            'surnames' => fake()->lastName() . ' ' . fake()->lastName(),
            'phone' => fake()->phoneNumber(),
            'favorite' => fake()->boolean(25),
        ];
    }
}
