<?php

namespace App\Http\Controllers\API\Monster;

use App\Http\Controllers\API\Base\BaseAPIController;
use App\Models\Monsters\Monster;
use App\Http\Resources\MonsterResource;
use App\Http\Resources\MonsterListResource;

class MonsterAPIController extends BaseAPIController
{
    public function list() {
        return response()->json(
            MonsterListResource::collection(
                Monster::get()
            )
        );
    }

    public function retrieve(int $id) {
        return response()
            ->json(
                new MonsterResource(
                    Monster::find($id)
                )
            );
    }
}
