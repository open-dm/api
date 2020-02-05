<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Core\Alignment;

class CreateAlignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alignments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->timestamps();
        });

        Alignment::insert(
            [
                ['name' => 'Lawful good', 'code' => 'lawful_good'],
                ['name' => 'Neutral good', 'code' => 'neutral_good'],
                ['name' => 'Chaotic good', 'code' => 'chaotic_good'],
                ['name' => 'Lawful neutral', 'code' => 'lawful_neutral'],
                ['name' => 'True neutral', 'code' => 'neutral_neutral'],
                ['name' => 'Chaotic neutral', 'code' => 'chaotic_neutral'],
                ['name' => 'Lawful evil', 'code' => 'lawful_evil'],
                ['name' => 'Neutral evil', 'code' => 'neutral_evil'],
                ['name' => 'Chaotic evil', 'code' => 'chaotic_evil']
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
        Schema::dropIfExists('alignments');
    }
}
