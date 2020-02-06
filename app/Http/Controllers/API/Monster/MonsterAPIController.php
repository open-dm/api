<?php

namespace App\Http\Controllers\API\Monster;

use App\Http\Controllers\API\AbstractAPIController;
use App\Models\Monsters\Monster;
use App\Http\Resources\MonsterResource;
use App\Http\Resources\MonsterListResource;
use App\Http\Requests\ApiListRequest;

class MonsterAPIController extends AbstractAPIController
{
    public function list(ApiListRequest $request) {
        $validated = $request->validated();

        $limit = $validated['limit'];
        $offset = $validated['offset'];

        return response()->json(
            MonsterListResource::collection(
                Monster
                    ::skip($offset)
                    ->take($limit)
                    ->get()
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
