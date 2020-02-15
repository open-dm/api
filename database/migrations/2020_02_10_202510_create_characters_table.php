<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('type');
            $table->integer('base_hp');
            $table->integer('speed');
            $table->integer('strength');
            $table->integer('dexterity');
            $table->integer('constitution');
            $table->integer('intelligence');
            $table->integer('wisdom');
            $table->integer('charisma');
            $table->integer('hp_dice_count');
            $table->boolean('is_template')->default(false);

            $table->integer('size_id');
            $table->integer('race_id');
            $table->integer('alignment_id');
            $table->integer('challenge_id')->nullable();
            $table->integer('hp_dice_id');
            $table->integer('parent_character_id')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
