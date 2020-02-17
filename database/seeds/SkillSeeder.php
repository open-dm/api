<?php

use App\Models\Core\Ability;
use Illuminate\Database\Seeder;

use App\Models\Core\Skill;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    public function run()
    {
        $abilities = Ability::all();

        DB::table('skills')->truncate();


        /**
         *
         * Insert Skills
         *
         */

        $skill = new Skill([
            'name' => 'Athletics',
            'code' => 'athletics',
        ]);
        $skill->ability()->associate($abilities->firstWhere('code', 'strength'));
        $skill->save();

        $skill = new Skill([
            'name' => 'Acrobatics',
            'code' => 'acrobatics',
        ]);
        $skill->ability()->associate($abilities->firstWhere('code', 'dexterity'));
        $skill->save();

        $skill = new Skill([
            'name' => 'Sleight of Hand',
            'code' => 'sleight_of_hand',
        ]);
        $skill->ability()->associate($abilities->firstWhere('code', 'dexterity'));
        $skill->save();

        $skill = new Skill([
            'name' => 'Stealth',
            'code' => 'stealth',
        ]);
        $skill->ability()->associate($abilities->firstWhere('code', 'dexterity'));
        $skill->save();

        $skill = new Skill([
            'name' => 'Arcana',
            'code' => 'arcana',
        ]);
        $skill->ability()->associate($abilities->firstWhere('code', 'intelligence'));
        $skill->save();

        $skill = new Skill([
            'name' => 'History',
            'code' => 'history',
        ]);
        $skill->ability()->associate($abilities->firstWhere('code', 'intelligence'));
        $skill->save();

        $skill = new Skill([
            'name' => 'Investigation',
            'code' => 'investigation',
        ]);
        $skill->ability()->associate($abilities->firstWhere('code', 'intelligence'));
        $skill->save();

        $skill = new Skill([
            'name' => 'Nature',
            'code' => 'nature',
        ]);
        $skill->ability()->associate($abilities->firstWhere('code', 'intelligence'));
        $skill->save();

        $skill = new Skill([
            'name' => 'Religion',
            'code' => 'religion',
        ]);
        $skill->ability()->associate($abilities->firstWhere('code', 'intelligence'));
        $skill->save();

        $skill = new Skill([
            'name' => 'Animal Handling',
            'code' => 'animal_handling',
        ]);
        $skill->ability()->associate($abilities->firstWhere('code', 'wisdom'));
        $skill->save();

        $skill = new Skill([
            'name' => 'Insight',
            'code' => 'insight',
        ]);
        $skill->ability()->associate($abilities->firstWhere('code', 'wisdom'));
        $skill->save();

        $skill = new Skill([
            'name' => 'Medicine',
            'code' => 'medicine',
        ]);
        $skill->ability()->associate($abilities->firstWhere('code', 'wisdom'));
        $skill->save();

        $skill = new Skill([
            'name' => 'Perception',
            'code' => 'perception',
        ]);
        $skill->ability()->associate($abilities->firstWhere('code', 'wisdom'));
        $skill->save();

        $skill = new Skill([
            'name' => 'Survival',
            'code' => 'survival',
        ]);
        $skill->ability()->associate($abilities->firstWhere('code', 'wisdom'));
        $skill->save();

        $skill = new Skill([
            'name' => 'Deception',
            'code' => 'deception',
        ]);
        $skill->ability()->associate($abilities->firstWhere('code', 'charisma'));
        $skill->save();

        $skill = new Skill([
            'name' => 'Intimidation',
            'code' => 'intimidation',
        ]);
        $skill->ability()->associate($abilities->firstWhere('code', 'charisma'));
        $skill->save();

        $skill = new Skill([
            'name' => 'Performance',
            'code' => 'performance',
        ]);
        $skill->ability()->associate($abilities->firstWhere('code', 'charisma'));
        $skill->save();

        $skill = new Skill([
            'name' => 'Persuasion',
            'code' => 'persuasion',
        ]);
        $skill->ability()->associate($abilities->firstWhere('code', 'charisma'));
        $skill->save();
    }
}
