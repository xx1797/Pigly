<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()
            ->create()
            ->each(function ($user) {
                \App\Models\WeightTarget::factory()->create(['user_id' => $user->id]);
                \App\Models\WeightLog::factory()->count(35)->create(['user_id' => $user->id]);
            });
    }
}
