<?php

use Illuminate\Database\Seeder;

use App\Models\Core\Dice;

class DiceSeeder extends Seeder
{
    public function run()
    {
        DB::table('dice')->truncate();


        /**
         *
         * Insert Dice
         *
         */

        Dice::create([
            'sides' => 4,
        ]);

        Dice::create([
            'sides' => 6,
        ]);

        Dice::create([
            'sides' => 8,
        ]);

        Dice::create([
            'sides' => 10,
        ]);

        Dice::create([
            'sides' => 12,
        ]);

        Dice::create([
            'sides' => 20,
        ]);

        Dice::create([
            'sides' => 100,
        ]);
    }
}
