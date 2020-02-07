<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Core\Skill;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
        });

        Skill::insert(
            [
                ['name' => 'Athletics', 'code' => 'athletics'],
                ['name' => 'Acrobatics', 'code' => 'acrobatics'],
                ['name' => 'Sleight of Hand', 'code' => 'sleight_of_hand'],
                ['name' => 'Stealth', 'code' => 'stealth'],
                ['name' => 'Arcana', 'code' => 'arcana'],
                ['name' => 'History', 'code' => 'history'],
                ['name' => 'Investigation', 'code' => 'investigation'],
                ['name' => 'Nature', 'code' => 'nature'],
                ['name' => 'Religion', 'code' => 'religion'],
                ['name' => 'Animal Handling', 'code' => 'animal_handling'],
                ['name' => 'Insight', 'code' => 'insight'],
                ['name' => 'Medicine', 'code' => 'medicine'],
                ['name' => 'Perception', 'code' => 'perception'],
                ['name' => 'Survival', 'code' => 'survival'],
                ['name' => 'Deception', 'code' => 'deception'],
                ['name' => 'Intimidation', 'code' => 'intimidation'],
                ['name' => 'Performance', 'code' => 'performance'],
                ['name' => 'Persuasion', 'code' => 'persuasion']
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
        Schema::dropIfExists('skills');
    }
}
