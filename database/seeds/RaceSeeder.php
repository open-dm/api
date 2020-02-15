<?php

use App\Models\Core\Race;
use App\Models\Core\Size;
use Illuminate\Database\Seeder;

class RaceSeeder extends Seeder
{
    public function run()
    {
        DB::table('races')->truncate();


        /**
         *
         * Insert Player Races
         *
         */

        Race::create([
            'name'     => 'Dragonborn',
            'code'     => 'dragonborn',
            'playable' => true,
        ]);

        Race::create([
            'name'     => 'Dwarf',
            'code'     => 'dwarf',
            'playable' => true,
        ]);

        Race::create([
            'name'     => 'Elf',
            'code'     => 'elf',
            'playable' => true,
        ]);

        Race::create([
            'name'     => 'Gnome',
            'code'     => 'gnome',
            'playable' => true,
        ]);

        Race::create([
            'name'     => 'Half Elf',
            'code'     => 'half_elf',
            'playable' => true,
        ]);

        Race::create([
            'name'     => 'Halfling',
            'code'     => 'halfling',
            'playable' => true,
        ]);

        Race::create([
            'name'     => 'Half Orc',
            'code'     => 'half_orc',
            'playable' => true,
        ]);

        Race::create([
            'name'     => 'Human',
            'code'     => 'human',
            'playable' => true,
        ]);

        Race::create([
            'name'     => 'Tiefling',
            'code'     => 'tiefling',
            'playable' => true,
        ]);


        /**
         *
         * Insert Monster Races
         *
         */
        Race::create([
            'name'     => 'Orc',
            'code'     => 'orc',
            'playable' => false,
        ]);

        Race::create([
            'name'     => 'Dragon',
            'code'     => 'dragon',
            'playable' => false,
        ]);
    }
}
