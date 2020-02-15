<?php

use App\Models\Core\Environment;
use App\Models\Core\Race;
use Illuminate\Database\Seeder;

class EnvironmentSeeder extends Seeder
{
    public function run()
    {
        DB::table('environments')->truncate();


        /**
         *
         * Insert Environments
         *
         */

        Environment::create([
            'name'     => 'Arctic',
            'code'     => 'arctic',
        ]);

        Environment::create([
            'name'     => 'Coastal',
            'code'     => 'coastal',
        ]);

        Environment::create([
            'name'     => 'Desert',
            'code'     => 'desert',
        ]);

        Environment::create([
            'name'     => 'Forest',
            'code'     => 'forest',
        ]);

        Environment::create([
            'name'     => 'Grassland',
            'code'     => 'grassland',
        ]);

        Environment::create([
            'name'     => 'Hill',
            'code'     => 'hill',
        ]);

        Environment::create([
            'name'     => 'Mountain',
            'code'     => 'mountain',
        ]);

        Environment::create([
            'name'     => 'Swamp',
            'code'     => 'swamp',
        ]);

        Environment::create([
            'name'     => 'Underdark',
            'code'     => 'underdark',
        ]);

        Environment::create([
            'name'     => 'Underwater',
            'code'     => 'underwater',
        ]);

        Environment::create([
            'name'     => 'Urban',
            'code'     => 'urban',
        ]);
    }
}
