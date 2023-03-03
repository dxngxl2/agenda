<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RoleFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
