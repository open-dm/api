<?php

namespace App\Http\Controllers\API\Monster;

use App\Http\Controllers\API\Base\BaseAPIController;
use App\Models\Monsters\Monster;
use App\Http\Resources\MonsterResource;

class MonsterAPIController extends BaseAPIController
{
    public function list() {
        dd(Monster::get());
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
