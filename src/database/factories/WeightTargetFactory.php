<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WeightTargetFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'target_weight' => 60.0,
        ];
    }
}
