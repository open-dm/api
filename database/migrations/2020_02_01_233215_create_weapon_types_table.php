<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Weapons\WeaponType;

class CreateWeaponTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weapon_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');

            $table->boolean('martial');
            $table->boolean('ranged');

            $table->timestamps();
        });

        WeaponType::insert(
            [
                ['name' => 'Simple melee', 'martial' => false, 'ranged' => false],
                ['name' => 'Simple ranged', 'martial' => false, 'ranged' => true],
                ['name' => 'Martial melee', 'martial' => true, 'ranged' => false],
                ['name' => 'Martial ranged', 'martial' => false, 'ranged' => true]
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
        Schema::dropIfExists('weapon_types');
    }
}
