<?php

use Illuminate\Database\Seeder;

use App\Models\Core\Skill;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    public function run()
    {
        DB::table('skills')->truncate();


        /**
         *
         * Insert Skills
         *
         */

        Skill::create([
            'name' => 'Athletics',
            'code' => 'athletics',
        ]);

        Skill::create([
            'name' => 'Acrobatics',
            'code' => 'acrobatics',
        ]);

        Skill::create([
            'name' => 'Sleight of Hand',
            'code' => 'sleight_of_hand',
        ]);

        Skill::create([
            'name' => 'Stealth',
            'code' => 'stealth',
        ]);

        Skill::create([
            'name' => 'Arcana',
            'code' => 'arcana',
        ]);

        Skill::create([
            'name' => 'History',
            'code' => 'history',
        ]);

        Skill::create([
            'name' => 'Investigation',
            'code' => 'investigation',
        ]);

        Skill::create([
            'name' => 'Nature',
            'code' => 'nature',
        ]);

        Skill::create([
            'name' => 'Religion',
            'code' => 'religion',
        ]);

        Skill::create([
            'name' => 'Animal Handling',
            'code' => 'animal_handling',
        ]);

        Skill::create([
            'name' => 'Insight',
            'code' => 'insight',
        ]);

        Skill::create([
            'name' => 'Medicine',
            'code' => 'medicine',
        ]);

        Skill::create([
            'name' => 'Perception',
            'code' => 'perception',
        ]);

        Skill::create([
            'name' => 'Survival',
            'code' => 'survival',
        ]);

        Skill::create([
            'name' => 'Deception',
            'code' => 'deception',
        ]);

        Skill::create([
            'name' => 'Intimidation',
            'code' => 'intimidation',
        ]);

        Skill::create([
            'name' => 'Performance',
            'code' => 'performance',
        ]);

        Skill::create([
            'name' => 'Persuasion',
            'code' => 'persuasion',
        ]);
    }
}
