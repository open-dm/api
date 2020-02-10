<?php

use App\Models\Characters\CharacterType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharacterTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('character_types')->truncate();


        /**
         *
         * Insert Types
         *
         */

        CharacterType::create([
            'name' => 'Player',
            'code' => 'player',
        ]);

        CharacterType::create([
            'name' => 'Monster',
            'code' => 'monster',
        ]);
    }
}
