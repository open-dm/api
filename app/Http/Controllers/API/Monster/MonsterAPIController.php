<?php

namespace App\Http\Controllers\Api;

use App\Models\Characters\Monster;
use App\Http\Resources\MonsterListResource;
use App\Http\Resources\MonsterResource;

class MonsterApiController extends CharacterApiController
{
    public $model_class         = Monster::class;
    public $resource_class      = MonsterResource::class;
    public $list_resource_class = MonsterListResource::class;
}
