<?php

namespace App\Http\Controllers\API\Monster;

use App\Http\Controllers\API\APIController;
use App\Models\Monsters\Monster;
use App\Http\Resources\MonsterListResource;
use App\Http\Resources\MonsterResource;

class MonsterAPIController extends APIController
{
    public $model_class = Monster::class;
    public $resource_class = MonsterResource::class;
    public $list_resource_class = MonsterListResource::class;
}
