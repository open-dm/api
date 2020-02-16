<?php

use App\Models\Core\Ability;
use App\Models\Core\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbilitySeeder extends Seeder
{
    public function run()
    {
        DB::table('abilities')->truncate();


        /**
         *
         * Insert Abilities
         *
         */

        Ability::create([
            'name' => 'Strength',
            'code' => 'strength',
        ]);

        Ability::create([
            'name' => 'Dexterity',
            'code' => 'dexterity',
        ]);

        Ability::create([
            'name' => 'Constitution',
            'code' => 'constitution',
        ]);

        Ability::create([
            'name' => 'Intelligence',
            'code' => 'intelligence',
        ]);

        Ability::create([
            'name' => 'Wisdom',
            'code' => 'wisdom',
        ]);

        Ability::create([
            'name' => 'Charisma',
            'code' => 'charisma',
        ]);
    }
}
