<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Armor\Armor;

class CreateArmorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armor', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->bigInteger('armor_type_id');

            $table->integer('cost');

            $table->integer('base_armor');

            $table->boolean('apply_dex_modifier');
            $table->integer('dex_cap');

            $table->integer('weight');

            $table->boolean('stealth_disadvantage');

            $table->integer('strength_requirement');

            $table->timestamps();
        });

        Armor::insert(
            [
                // light armor
                [
                    'name' => 'Padded',
                    'armor_type_id' => 1,
                    'cost' => 5,
                    'base_armor' => 11,
                    'apply_dex_modifier' => true,
                    'dex_cap' => 0,
                    'weight' => 8,
                    'stealth_disadvantage' => true,
                    'strength_requirement' => 0
                ],
                [
                    'name' => 'Leather',
                    'armor_type_id' => 1,
                    'cost' => 10,
                    'base_armor' => 11,
                    'apply_dex_modifier' => true,
                    'dex_cap' => 0,
                    'weight' => 10,
                    'stealth_disadvantage' => false,
                    'strength_requirement' => 0
                ],
                [
                    'name' => 'Studded leather',
                    'armor_type_id' => 1,
                    'cost' => 45,
                    'base_armor' => 12,
                    'apply_dex_modifier' => true,
                    'dex_cap' => 0,
                    'weight' => 13,
                    'stealth_disadvantage' => false,
                    'strength_requirement' => 0
                ],

                //medium armor
                [
                    'name' => 'Hide',
                    'armor_type_id' => 2,
                    'cost' => 10,
                    'base_armor' => 12,
                    'apply_dex_modifier' => true,
                    'dex_cap' => 2,
                    'weight' => 12,
                    'stealth_disadvantage' => false,
                    'strength_requirement' => 0
                ],
                [
                    'name' => 'Chain shirt',
                    'armor_type_id' => 2,
                    'cost' => 50,
                    'base_armor' => 13,
                    'apply_dex_modifier' => true,
                    'dex_cap' => 2,
                    'weight' => 20,
                    'stealth_disadvantage' => false,
                    'strength_requirement' => 0
                ],
                [
                    'name' => 'Scale mail',
                    'armor_type_id' => 2,
                    'cost' => 50,
                    'base_armor' => 14,
                    'apply_dex_modifier' => true,
                    'dex_cap' => 2,
                    'weight' => 45,
                    'stealth_disadvantage' => true,
                    'strength_requirement' => 0
                ],
                [
                    'name' => 'Breastplate',
                    'armor_type_id' => 2,
                    'cost' => 400,
                    'base_armor' => 14,
                    'apply_dex_modifier' => true,
                    'dex_cap' => 2,
                    'weight' => 20,
                    'stealth_disadvantage' => false,
                    'strength_requirement' => 0
                ],
                [
                    'name' => 'Half plate',
                    'armor_type_id' => 2,
                    'cost' => 750,
                    'base_armor' => 15,
                    'apply_dex_modifier' => true,
                    'dex_cap' => 2,
                    'weight' => 40,
                    'stealth_disadvantage' => true,
                    'strength_requirement' => 0
                ],

                //heavy armor
                [
                    'name' => 'Ring mail',
                    'armor_type_id' => 3,
                    'cost' => 30,
                    'base_armor' => 14,
                    'apply_dex_modifier' => false,
                    'dex_cap' => 0,
                    'weight' => 40,
                    'stealth_disadvantage' => true,
                    'strength_requirement' => 0
                ],
                [
                    'name' => 'Chain mail',
                    'armor_type_id' => 3,
                    'cost' => 75,
                    'base_armor' => 16,
                    'apply_dex_modifier' => false,
                    'dex_cap' => 0,
                    'weight' => 55,
                    'stealth_disadvantage' => true,
                    'strength_requirement' => 13
                ],
                [
                    'name' => 'Splint',
                    'armor_type_id' => 3,
                    'cost' => 200,
                    'base_armor' => 17,
                    'apply_dex_modifier' => false,
                    'dex_cap' => 0,
                    'weight' => 60,
                    'stealth_disadvantage' => true,
                    'strength_requirement' => 15
                ],
                [
                    'name' => 'Plate',
                    'armor_type_id' => 3,
                    'cost' => 1500,
                    'base_armor' => 18,
                    'apply_dex_modifier' => false,
                    'dex_cap' => 0,
                    'weight' => 65,
                    'stealth_disadvantage' => true,
                    'strength_requirement' => 15
                ]
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
        Schema::dropIfExists('armor');
    }
}
