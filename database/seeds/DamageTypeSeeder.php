<?php

use Illuminate\Database\Seeder;

use App\Models\Core\DamageType;
use Illuminate\Support\Facades\DB;

class DamageTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('damage_types')->truncate();


        /**
         *
         * Insert Damage Types
         *
         */

        DamageType::create([
            'name' => 'Acid',
            'code' => 'acid',
        ]);

        DamageType::create([
            'name' => 'Bludgeoning',
            'code' => 'bludgeoning',
        ]);

        DamageType::create([
            'name' => 'Cold',
            'code' => 'cold',
        ]);

        DamageType::create([
            'name' => 'Fire',
            'code' => 'fire',
        ]);

        DamageType::create([
            'name' => 'Force',
            'code' => 'force',
        ]);

        DamageType::create([
            'name' => 'Lighting',
            'code' => 'lighting',
        ]);

        DamageType::create([
            'name' => 'Necrotic',
            'code' => 'necrotic',
        ]);

        DamageType::create([
            'name' => 'Piercing',
            'code' => 'piercing',
        ]);

        DamageType::create([
            'name' => 'Poison',
            'code' => 'poison',
        ]);

        DamageType::create([
            'name' => 'Psychic',
            'code' => 'psychic',
        ]);

        DamageType::create([
            'name' => 'Radiant',
            'code' => 'radiant',
        ]);

        DamageType::create([
            'name' => 'Slashing',
            'code' => 'slashing',
        ]);

        DamageType::create([
            'name' => 'Thunder',
            'code' => 'thunder',
        ]);
    }
}
