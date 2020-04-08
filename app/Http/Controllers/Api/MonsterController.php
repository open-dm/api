<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CharacterResource;
use App\Models\Characters\Monster;

class MonsterController extends CharacterController
{
    public static $model_class    = Monster::class;
    public static $resource_class = CharacterResource::class;
}
