<?php

use Illuminate\Database\Seeder;

use App\Models\Core\Challenge;

class ChallengeSeeder extends Seeder
{
    public function run()
    {
        Challenge::create([
            'level' => 0,
            'xp' => 0,
        ]);

        Challenge::create([
            'level' => 0.125,
            'xp' => 25,
        ]);

        Challenge::create([
            'level' => 0.25,
            'xp' => 50,
        ]);

        Challenge::create([
            'level' => 0.5,
            'xp' => 100,
        ]);

        Challenge::create([
            'level' => 1,
            'xp' => 200,
        ]);

        Challenge::create([
            'level' => 2,
            'xp' => 450,
        ]);

        Challenge::create([
            'level' => 3,
            'xp' => 700,
        ]);

        Challenge::create([
            'level' => 4,
            'xp' => 1100,
        ]);

        Challenge::create([
            'level' => 5,
            'xp' => 1800,
        ]);

        Challenge::create([
            'level' => 6,
            'xp' => 2300,
        ]);

        Challenge::create([
            'level' => 7,
            'xp' => 2900,
        ]);

        Challenge::create([
            'level' => 8,
            'xp' => 3900,
        ]);

        Challenge::create([
            'level' => 9,
            'xp' => 5000,
        ]);

        Challenge::create([
            'level' => 10,
            'xp' => 5900,
        ]);

        Challenge::create([
            'level' => 11,
            'xp' => 7200,
        ]);

        Challenge::create([
            'level' => 12,
            'xp' => 8400,
        ]);

        Challenge::create([
            'level' => 13,
            'xp' => 10000,
        ]);

        Challenge::create([
            'level' => 14,
            'xp' => 11500,
        ]);

        Challenge::create([
            'level' => 15,
            'xp' => 13000,
        ]);

        Challenge::create([
            'level' => 16,
            'xp' => 15000,
        ]);

        Challenge::create([
            'level' => 17,
            'xp' => 18000,
        ]);

        Challenge::create([
            'level' => 18,
            'xp' => 20000,
        ]);

        Challenge::create([
            'level' => 19,
            'xp' => 22000,
        ]);

        Challenge::create([
            'level' => 20,
            'xp' => 25000,
        ]);

        Challenge::create([
            'level' => 21,
            'xp' => 33000,
        ]);

        Challenge::create([
            'level' => 22,
            'xp' => 41000,
        ]);

        Challenge::create([
            'level' => 23,
            'xp' => 50000,
        ]);

        Challenge::create([
            'level' => 24,
            'xp' => 62000,
        ]);

        Challenge::create([
            'level' => 25,
            'xp' => 75000,
        ]);

        Challenge::create([
            'level' => 26,
            'xp' => 90000,
        ]);

        Challenge::create([
            'level' => 27,
            'xp' => 105000,
        ]);

        Challenge::create([
            'level' => 28,
            'xp' => 120000,
        ]);

        Challenge::create([
            'level' => 29,
            'xp' => 135000,
        ]);

        Challenge::create([
            'level' => 30,
            'xp' => 155000,
        ]);
    }
}