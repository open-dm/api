<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Language\Language;

class CreateLanguagesTable extends Migration
{
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->boolean('exotic');
            $table->bigInteger('script_id')->nullable();
        });

        Schema::create('language_scripts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::create('character_languages', function (Blueprint $table) {
            $table->bigInteger('character_id');
            $table->bigInteger('language_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('languages');
        Schema::dropIfExists('language_scripts');
        Schema::dropIfExists('character_languages');
    }
}
