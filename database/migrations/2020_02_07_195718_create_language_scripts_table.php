<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Language\LanguageScript;

class CreateLanguageScriptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_scripts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        LanguageScript::insert(
            [
                ['name' => 'Common'],
                ['name' => 'Dwarvish'],
                ['name' => 'Elvish'],
                ['name' => 'Celestial'],
                ['name' => 'Draconic'],
                ['name' => 'Infernal']
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_scripts');
    }
}
