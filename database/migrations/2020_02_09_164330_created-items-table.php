<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatedItemsTable extends Migration
{
    public function up()
    {
        Schema::create(
            'items',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('type_id');
                $table->bigInteger('subtype_id');
                $table->string('name');
                $table->integer('cost');
                $table->integer('weight');
            }
        );
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}
