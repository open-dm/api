<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Core\Dice;

class CreateDiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dice', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sides');
        });

        Dice::insert(
            [
                ['sides' => 4],
                ['sides' => 6],
                ['sides' => 8],
                ['sides' => 10],
                ['sides' => 12],
                ['sides' => 20],
                ['sides' => 100]
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
        Schema::dropIfExists('dice');
    }
}
