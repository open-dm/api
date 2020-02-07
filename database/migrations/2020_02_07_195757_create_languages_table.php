<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Language\Language;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->boolean('exotic');
            $table->bigInteger('script_id')->nullable();
        });

        Language::insert(
            [
                ['name' => 'Common', 'exotic' => false, 'script_id' => 1],
                ['name' => 'Dwarvish', 'exotic' => false, 'script_id' => 2],
                ['name' => 'Elvish', 'exotic' => false, 'script_id' => 3],
                ['name' => 'Giant', 'exotic' => false, 'script_id' => 3],
                ['name' => 'Gnomish', 'exotic' => false, 'script_id' => 3],
                ['name' => 'Goblin', 'exotic' => false, 'script_id' => 3],
                ['name' => 'Halfling', 'exotic' => false, 'script_id' => 1],
                ['name' => 'Orc', 'exotic' => false, 'script_id' => 3],
                ['name' => 'Abyssal', 'exotic' => true, 'script_id' => 6],
                ['name' => 'Celestial', 'exotic' => true, 'script_id' => 4],
                ['name' => 'Draconic', 'exotic' => true, 'script_id' => 5],
                ['name' => 'Deep Speech', 'exotic' => true, 'script_id' => null],
                ['name' => 'Infernal', 'exotic' => true, 'script_id' => 6],
                ['name' => 'Primordial', 'exotic' => true, 'script_id' => 2],
                ['name' => 'Sylvan', 'exotic' => true, 'script_id' => 3],
                ['name' => 'Undercommon', 'exotic' => true, 'script_id' => 3],
                ['name' => 'Druidic', 'exotic' => true, 'script_id' => null]
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
