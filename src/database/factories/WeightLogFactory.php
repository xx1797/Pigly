<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => 1, // SeederでUserを先に作成
            'date' => $this->faker->dateTimeBetween('-2 months', 'now')->format('Y-m-d'),
            'weight' => $this->faker->randomFloat(1, 40, 120), // 小数点1桁
            'calories' => $this->faker->numberBetween(1500, 3000),
            'exercise_time' => $this->faker->time('H:i:s'),
            'exercise_content' => $this->faker->sentence(4),
        ];
    }
}
