<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Core\DamageType;

class CreateDamageTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('damage_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        DamageType::insert(
            [
                ['name' => 'Acid'],
                ['name' => 'Bludgeoning'],
                ['name' => 'Cold'],
                ['name' => 'Fire'],
                ['name' => 'Force'],
                ['name' => 'Lightning'],
                ['name' => 'Necrotic'],
                ['name' => 'Piercing'],
                ['name' => 'Poison'],
                ['name' => 'Psychic'],
                ['name' => 'Radiant'],
                ['name' => 'Slashing'],
                ['name' => 'Thunder']
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
        Schema::dropIfExists('damage_types');
    }
}
