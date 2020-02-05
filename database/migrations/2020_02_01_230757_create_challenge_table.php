<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Monster\Challenge;

class CreateChallengeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('level');
            $table->integer('xp');
            $table->timestamps();
        });

        Challenge::insert(
            [
                ['level' => 0, 'xp' => 10],
                ['level' => 0.125, 'xp' => 25],
                ['level' => 0.25, 'xp' => 50],
                ['level' => 0.5, 'xp' => 100],
                ['level' => 1, 'xp' => 200],
                ['level' => 2, 'xp' => 450],
                ['level' => 3, 'xp' => 700],
                ['level' => 4, 'xp' => 1100],
                ['level' => 5, 'xp' => 1800],
                ['level' => 6, 'xp' => 2300],
                ['level' => 7, 'xp' => 2900],
                ['level' => 8, 'xp' => 3900],
                ['level' => 9, 'xp' => 5000],
                ['level' => 10, 'xp' => 5900],
                ['level' => 11, 'xp' => 7200],
                ['level' => 12, 'xp' => 8400],
                ['level' => 13, 'xp' => 10000],
                ['level' => 14, 'xp' => 11500],
                ['level' => 15, 'xp' => 13000],
                ['level' => 16, 'xp' => 15000],
                ['level' => 17, 'xp' => 18000],
                ['level' => 18, 'xp' => 20000],
                ['level' => 19, 'xp' => 22000],
                ['level' => 20, 'xp' => 25000]
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
        Schema::dropIfExists('challenges');
    }
}
