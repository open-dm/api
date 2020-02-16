<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create(
            'items',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('code');
                $table->integer('cost');
                $table->integer('weight');
                $table->bigInteger('type_id');
                $table->bigInteger('subtype_id');
            }
        );
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}
