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
            $table->integer('speed');
            $table->integer('base_hit_points');
            $table->integer('hit_point_dice_count');
            $table->boolean('is_template')->default(false);

            $table->integer('size_id');
            $table->integer('race_id');
            $table->integer('alignment_id')->nullable();
            $table->integer('challenge_id')->nullable();
            $table->integer('hit_point_dice_id');
            $table->integer('parent_character_id')->nullable();

            $table->timestamps();
        });

        Schema::create('character_senses', function (Blueprint $table) {
            $table->integer('character_id');
            $table->integer('sense_id');
            $table->integer('distance')->default(0);
        });

        Schema::create('character_abilities', function (Blueprint $table) {
            $table->integer('character_id');
            $table->integer('ability_id');
            $table->integer('score')->default(0);
        });

        Schema::create('character_skills', function (Blueprint $table) {
            $table->integer('character_id');
            $table->integer('skill_id');
            $table->integer('bonus')->default(0);
        });

        Schema::create('character_environments', function (Blueprint $table) {
            $table->integer('character_id');
            $table->integer('environment_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('characters');
        Schema::dropIfExists('character_senses');
        Schema::dropIfExists('character_skills');
        Schema::dropIfExists('character_environments');
    }
}
