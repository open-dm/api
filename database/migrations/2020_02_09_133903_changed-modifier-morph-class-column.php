<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangedModifierMorphClassColumn extends Migration
{
    public function up()
    {
        Schema::table('modifiers', function(Blueprint $table) {
            $table->renameColumn('object_class', 'object_type');
        });
    }


    public function down()
    {
        Schema::table('modifiers', function(Blueprint $table) {
            $table->renameColumn('object_type', 'object_class');
        });
    }
}
