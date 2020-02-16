<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('type');
            $table->integer('dice_id');
            $table->integer('dice_count');
            $table->integer('action_bonus')->default(0);
            $table->integer('roll_bonus')->default(0);
            $table->string('description')->nullable();
            $table->boolean('consumes_item')->default(false);
            $table->bigInteger('object_id');
            $table->string('object_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actions');
    }
}
