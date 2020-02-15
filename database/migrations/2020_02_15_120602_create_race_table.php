<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaceTable extends Migration
{
    public function up()
    {
        Schema::create(
            'races',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('code');
                $table->boolean('playable');
            }
        );
    }

    public function down()
    {
        Schema::dropIfExists('races');
    }
}
