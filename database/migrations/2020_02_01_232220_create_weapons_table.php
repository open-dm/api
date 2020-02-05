<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Weapons\Weapon;

class CreateWeaponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weapons', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->bigInteger('weapon_type_id');
            $table->integer('cost');
            $table->bigInteger('damage_type_id');
            $table->integer('weight');
            $table->bigInteger('damage_dice_id');
            $table->integer('dice_count');

            $table->timestamps();
        });

        Weapon::insert(
            [
                // simple melee weapons
                [
                    'name' => 'Club',
                    'weapon_type_id' => 1,
                    'cost' => 1,
                    'damage_type_id' => 2,
                    'weight' => 2,
                    'damage_dice_id' => 1,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Dagger',
                    'weapon_type_id' => 1,
                    'cost' => 2,
                    'damage_type_id' => 8,
                    'weight' => 1,
                    'damage_dice_id' => 1,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Greatclub',
                    'weapon_type_id' => 1,
                    'cost' => 2,
                    'damage_type_id' => 2,
                    'weight' => 10,
                    'damage_dice_id' => 3,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Handaxe',
                    'weapon_type_id' => 1,
                    'cost' => 5,
                    'damage_type_id' => 12,
                    'weight' => 2,
                    'damage_dice_id' => 2,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Javelin',
                    'weapon_type_id' => 1,
                    'cost' => 5,
                    'damage_type_id' => 8,
                    'weight' => 2,
                    'damage_dice_id' => 2,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Light hammer',
                    'weapon_type_id' => 1,
                    'cost' => 2,
                    'damage_type_id' => 2,
                    'weight' => 2,
                    'damage_dice_id' => 1,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Mace',
                    'weapon_type_id' => 1,
                    'cost' => 5,
                    'damage_type_id' =>2,
                    'weight' => 4,
                    'damage_dice_id' => 2,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Quarterstaff',
                    'weapon_type_id' => 1,
                    'cost' => 2,
                    'damage_type_id' => 2,
                    'weight' => 4,
                    'damage_dice_id' => 2,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Sickle',
                    'weapon_type_id' => 1,
                    'cost' => 1,
                    'damage_type_id' => 12,
                    'weight' => 2,
                    'damage_dice_id' => 1,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Spear',
                    'weapon_type_id' => 1,
                    'cost' => 1,
                    'damage_type_id' => 8,
                    'weight' => 2,
                    'damage_dice_id' => 2,
                    'dice_count' => 1
                ],

                // simple ranged weapons
                [
                    'name' => 'Crossbow, light',
                    'weapon_type_id' => 2,
                    'cost' => 25,
                    'damage_type_id' => 8,
                    'weight' => 5,
                    'damage_dice_id' => 3,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Dart',
                    'weapon_type_id' => 2,
                    'cost' => 5,
                    'damage_type_id' => 8,
                    'weight' => 1,
                    'damage_dice_id' => 1,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Shortbow',
                    'weapon_type_id' => 2,
                    'cost' => 25,
                    'damage_type_id' => 8,
                    'weight' => 2,
                    'damage_dice_id' => 2,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Sling',
                    'weapon_type_id' => 2,
                    'cost' => 1,
                    'damage_type_id' => 2,
                    'weight' => 0,
                    'damage_dice_id' => 1,
                    'dice_count' => 1
                ],

                // martial melee weapons
                [
                    'name' => 'Battleaxe',
                    'weapon_type_id' => 3,
                    'cost' => 10,
                    'damage_type_id' => 12,
                    'weight' => 4,
                    'damage_dice_id' => 3,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Flail',
                    'weapon_type_id' => 3,
                    'cost' => 10,
                    'damage_type_id' => 2,
                    'weight' => 2,
                    'damage_dice_id' => 3,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Glaive',
                    'weapon_type_id' => 3,
                    'cost' => 20,
                    'damage_type_id' => 12,
                    'weight' => 6,
                    'damage_dice_id' => 4,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Greataxe',
                    'weapon_type_id' => 3,
                    'cost' => 30,
                    'damage_type_id' => 12,
                    'weight' => 7,
                    'damage_dice_id' => 5,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Greatsword',
                    'weapon_type_id' => 3,
                    'cost' => 50,
                    'damage_type_id' => 12,
                    'weight' => 6,
                    'damage_dice_id' => 2,
                    'dice_count' => 2
                ],
                [
                    'name' => 'Halberd',
                    'weapon_type_id' => 3,
                    'cost' => 20,
                    'damage_type_id' => 12,
                    'weight' => 6,
                    'damage_dice_id' => 4,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Lance',
                    'weapon_type_id' => 3,
                    'cost' => 10,
                    'damage_type_id' => 8,
                    'weight' => 6,
                    'damage_dice_id' => 5,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Longsword',
                    'weapon_type_id' => 3,
                    'cost' => 15,
                    'damage_type_id' => 12,
                    'weight' => 3,
                    'damage_dice_id' => 3,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Maul',
                    'weapon_type_id' => 3,
                    'cost' => 10,
                    'damage_type_id' => 2,
                    'weight' => 10,
                    'damage_dice_id' => 2,
                    'dice_count' => 2
                ],
                [
                    'name' => 'Morningstar',
                    'weapon_type_id' => 3,
                    'cost' => 15,
                    'damage_type_id' => 8,
                    'weight' => 4,
                    'damage_dice_id' => 3,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Pike',
                    'weapon_type_id' => 3,
                    'cost' => 5,
                    'damage_type_id' => 8,
                    'weight' => 18,
                    'damage_dice_id' => 4,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Rapier',
                    'weapon_type_id' => 3,
                    'cost' => 25,
                    'damage_type_id' => 8,
                    'weight' => 2,
                    'damage_dice_id' => 3,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Scimitar',
                    'weapon_type_id' => 3,
                    'cost' => 25,
                    'damage_type_id' => 12,
                    'weight' => 3,
                    'damage_dice_id' => 2,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Shortsword',
                    'weapon_type_id' => 3,
                    'cost' => 10,
                    'damage_type_id' => 8,
                    'weight' => 2,
                    'damage_dice_id' => 2,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Trident',
                    'weapon_type_id' => 3,
                    'cost' => 5,
                    'damage_type_id' => 8,
                    'weight' => 4,
                    'damage_dice_id' => 2,
                    'dice_count' => 1
                ],
                [
                    'name' => 'War pick',
                    'weapon_type_id' => 3,
                    'cost' => 5,
                    'damage_type_id' => 8,
                    'weight' => 2,
                    'damage_dice_id' => 3,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Warhammer',
                    'weapon_type_id' => 3,
                    'cost' => 15,
                    'damage_type_id' => 2,
                    'weight' => 2,
                    'damage_dice_id' => 3,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Whip',
                    'weapon_type_id' => 3,
                    'cost' => 2,
                    'damage_type_id' => 12,
                    'weight' => 3,
                    'damage_dice_id' => 1,
                    'dice_count' => 1
                ],

                // martial ranged weapons
                [
                    'name' => 'Crossbow, hand',
                    'weapon_type_id' => 4,
                    'cost' => 75,
                    'damage_type_id' => 8,
                    'weight' => 3,
                    'damage_dice_id' => 2,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Crossbow, heavy',
                    'weapon_type_id' => 4,
                    'cost' => 50,
                    'damage_type_id' => 8,
                    'weight' => 18,
                    'damage_dice_id' => 4,
                    'dice_count' => 1
                ],
                [
                    'name' => 'Longbow',
                    'weapon_type_id' => 4,
                    'cost' => 50,
                    'damage_type_id' => 8,
                    'weight' => 2,
                    'damage_dice_id' => 3,
                    'dice_count' => 1
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
        Schema::dropIfExists('weapons');
    }
}
