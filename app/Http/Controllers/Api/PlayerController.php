<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CharacterResource;
use App\Models\Characters\Character;
use App\Models\Characters\Player;
use Illuminate\Http\Request;

class PlayerController extends CharacterController
{
    public static $character_class    = Player::class;
    public static $character_resource = CharacterResource::class;
}
