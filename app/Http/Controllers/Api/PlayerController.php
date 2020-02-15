<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CharacterResource;
use App\Models\Characters\Character;
use App\Models\Characters\Player;
use Illuminate\Http\Request;

class PlayerController extends CharacterController
{
    public $model_class    = Monster::class;
    public $resource_class = CharacterResource::class;
}
