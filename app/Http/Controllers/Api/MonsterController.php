<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CharacterResource;
use App\Models\Characters\Monster;

class MonsterController extends CharacterController
{
    public static $character_class    = Monster::class;
    public static $character_resource = CharacterResource::class;
}
