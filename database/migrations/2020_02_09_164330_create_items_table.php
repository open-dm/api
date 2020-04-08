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

        Schema::create(
            'item_types',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('code');
            }
        );

        Schema::create(
            'item_subtypes',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('code');
            }
        );

        Schema::create(
            'item_containers',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('item_container_id');
                $table->string('item_container_type');
                $table->integer('item_id');
                $table->boolean('equipped')->default(false);
                $table->integer('quantity')->default(1);
                $table->string('name')->nullable();
            }
        );
    }

    public function down()
    {
        Schema::dropIfExists('items');
        Schema::dropIfExists('item_types');
        Schema::dropIfExists('item_subtypes');

        Schema::dropIfExists('object_items');
    }
}
