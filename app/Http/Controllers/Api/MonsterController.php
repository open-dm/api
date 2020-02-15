<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CharacterResource;
use App\Models\Characters\Monster;

class MonsterController extends CharacterController
{
    public $model_class    = Monster::class;
    public $resource_class = CharacterResource::class;
}
