<?php

use App\Sense;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SenseSeeder extends Seeder
{
    public function run()
    {
        DB::table('senses')->truncate();


        /**
         *
         * Insert Senses
         *
         */
        Sense::create([
            'name' => 'Vision',
            'code' => 'vision',
        ]);

        Sense::create([
            'name' => 'Darkvision',
            'code' => 'darkvision',
        ]);

        Sense::create([
            'name' => 'Blindsight',
            'code' => 'blindsight',
        ]);

        Sense::create([
            'name' => 'Tremorsense',
            'code' => 'tremorsense',
        ]);

        Sense::create([
            'name' => 'Truesight',
            'code' => 'truesight',
        ]);
    }
}
