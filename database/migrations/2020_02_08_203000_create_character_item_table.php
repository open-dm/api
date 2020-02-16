<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterItemTable extends Migration
{
    public function up()
    {
        Schema::create('character_items', function (Blueprint $table) {
            $table->integer('item_id');
            $table->integer('character_id');
            $table->boolean('equipped');
        });
    }

    public function down()
    {
        Schema::dropIfExists('character_items');
    }
}
