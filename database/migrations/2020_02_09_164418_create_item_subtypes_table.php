<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemSubtypesTable extends Migration
{
    public function up()
    {
        Schema::create(
            'item_subtypes',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('code');
            }
        );
    }

    public function down()
    {
        Schema::dropIfExists('item_subtypes');
    }
}
