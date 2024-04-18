<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Chirp;
use App\Models\User;
use Faker\Factory as Faker;


class ChirpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all user IDs
        $userIds = User::pluck('id');

        Chirp::factory()
            ->count(70)
            ->create([
                'user_id' => $userIds->random(),
            ]);
    }
}
