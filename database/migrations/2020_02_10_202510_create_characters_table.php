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
            $table->string('base_hp');
            $table->string('speed');
            $table->string('strength');
            $table->string('dexterity');
            $table->string('constitution');
            $table->string('intelligence');
            $table->string('wisdom');
            $table->string('charisma');
            $table->integer('hp_dice_count');
            $table->boolean('is_template')->default(false);

            $table->integer('size_id');
            $table->bigInteger('alignment_id');
            $table->bigInteger('challenge_id')->nullable();
            $table->bigInteger('hp_dice_id');
            $table->bigInteger('parent_character_id')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
