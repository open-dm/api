<?php

use Illuminate\Database\Seeder;

use App\Models\Language\Language;
use App\Models\Language\LanguageScript;

class LanguageSeeder extends Seeder
{
    public function run()
    {
        DB::table('languages')->truncate();
        DB::table('language_scripts')->truncate();


        /**
         *
         * Insert Language Scripts
         *
         */

        $common_script = LanguageScript::create([
            'name' => 'Common',
        ]);

        $dwarvish_script = LanguageScript::create([
            'name' => 'Dwarvish',
        ]);

        $elvish_script = LanguageScript::create([
            'name' => 'Elvish',
        ]);

        $celestial_script = LanguageScript::create([
            'name' => 'Celestial',
        ]);

        $draconic_script = LanguageScript::create([
            'name' => 'Draconic',
        ]);

        $infernal_script = LanguageScript::create([
            'name' => 'Infernal',
        ]);


        /**
         *
         * Insert Common Languages
         *
         */

        Language::create([
            'name'      => 'Common',
            'exotic'    => 0,
            'script_id' => $common_script->id,
        ]);

        Language::create([
            'name'      => 'Dwarvish',
            'exotic'    => 0,
            'script_id' => $dwarvish_script->id,
        ]);

        Language::create([
            'name'      => 'Elvish',
            'exotic'    => 0,
            'script_id' => $elvish_script->id,
        ]);

        Language::create([
            'name'      => 'Giant',
            'exotic'    => 0,
            'script_id' => $elvish_script->id,
        ]);

        Language::create([
            'name'      => 'Gnomish',
            'exotic'    => 0,
            'script_id' => $elvish_script->id,
        ]);

        Language::create([
            'name'      => 'Goblin',
            'exotic'    => 0,
            'script_id' => $elvish_script->id,
        ]);

        Language::create([
            'name'      => 'Halfling',
            'exotic'    => 0,
            'script_id' => $common_script->id,
        ]);

        Language::create([
            'name'      => 'Orc',
            'exotic'    => 0,
            'script_id' => $elvish_script->id,
        ]);


        /**
         *
         * Insert Exotic Languages
         *
         */

        Language::create([
            'name'      => 'Abyssal',
            'exotic'    => 1,
            'script_id' => $infernal_script->id,
        ]);

        Language::create([
            'name'      => 'Celestial',
            'exotic'    => 1,
            'script_id' => $celestial_script->id,
        ]);

        Language::create([
            'name'      => 'Draconic',
            'exotic'    => 1,
            'script_id' => $draconic_script->id,
        ]);

        Language::create([
            'name'      => 'Deep Speech',
            'exotic'    => 1,
            'script_id' => null,
        ]);

        Language::create([
            'name'      => 'Infernal',
            'exotic'    => 1,
            'script_id' => $infernal_script->id,
        ]);

        Language::create([
            'name'      => 'Primordial',
            'exotic'    => 1,
            'script_id' => $dwarvish_script->id,
        ]);

        Language::create([
            'name'      => 'Sylvan',
            'exotic'    => 1,
            'script_id' => $elvish_script->id,
        ]);

        Language::create([
            'name'      => 'Undercommon',
            'exotic'    => 1,
            'script_id' => $elvish_script->id,
        ]);

        Language::create([
            'name'      => 'Druidic',
            'exotic'    => 1,
            'script_id' => null,
        ]);
    }
}
