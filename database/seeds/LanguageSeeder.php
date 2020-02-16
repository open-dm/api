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
            'code'      => 'common',
            'exotic'    => 0,
            'script_id' => $common_script->id,
        ]);

        Language::create([
            'name'      => 'Dwarvish',
            'code'      => 'dwarvish',
            'exotic'    => 0,
            'script_id' => $dwarvish_script->id,
        ]);

        Language::create([
            'name'      => 'Elvish',
            'code'      => 'elvish',
            'exotic'    => 0,
            'script_id' => $elvish_script->id,
        ]);

        Language::create([
            'name'      => 'Giant',
            'code'      => 'giant',
            'exotic'    => 0,
            'script_id' => $elvish_script->id,
        ]);

        Language::create([
            'name'      => 'Gnomish',
            'code'      => 'gnomish',
            'exotic'    => 0,
            'script_id' => $elvish_script->id,
        ]);

        Language::create([
            'name'      => 'Goblin',
            'code'      => 'goblin',
            'exotic'    => 0,
            'script_id' => $elvish_script->id,
        ]);

        Language::create([
            'name'      => 'Halfling',
            'code'      => 'halfling',
            'exotic'    => 0,
            'script_id' => $common_script->id,
        ]);

        Language::create([
            'name'      => 'Orc',
            'code'      => 'orc',
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
            'code'      => 'abyssal',
            'exotic'    => 1,
            'script_id' => $infernal_script->id,
        ]);

        Language::create([
            'name'      => 'Celestial',
            'code'      => 'celestial',
            'exotic'    => 1,
            'script_id' => $celestial_script->id,
        ]);

        Language::create([
            'name'      => 'Draconic',
            'code'      => 'draconic',
            'exotic'    => 1,
            'script_id' => $draconic_script->id,
        ]);

        Language::create([
            'name'      => 'Deep Speech',
            'code'      => 'deep_speech',
            'exotic'    => 1,
            'script_id' => null,
        ]);

        Language::create([
            'name'      => 'Infernal',
            'code'      => 'infernal',
            'exotic'    => 1,
            'script_id' => $infernal_script->id,
        ]);

        Language::create([
            'name'      => 'Primordial',
            'code'      => 'primordial',
            'exotic'    => 1,
            'script_id' => $dwarvish_script->id,
        ]);

        Language::create([
            'name'      => 'Sylvan',
            'code'      => 'sylvan',
            'exotic'    => 1,
            'script_id' => $elvish_script->id,
        ]);

        Language::create([
            'name'      => 'Undercommon',
            'code'      => 'undercommon',
            'exotic'    => 1,
            'script_id' => $elvish_script->id,
        ]);

        Language::create([
            'name'      => 'Druidic',
            'code'      => 'druidic',
            'exotic'    => 1,
            'script_id' => null,
        ]);
    }
}
