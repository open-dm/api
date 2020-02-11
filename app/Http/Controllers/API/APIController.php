<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiListRequest;
use App\Models\Characters\Character;
use App\Models\Characters\Monster;
use App\Models\Characters\Player;
use App\Models\Core\Alignment;
use App\Models\Core\Dice;
use App\Models\Core\Size;
use Illuminate\Support\Arr;

class APIController extends Controller
{
    public function list(ApiListRequest $request)
    {
        $validated = $request->validated();

        $limit = Arr::get($validated, 'limit', 100);
        $offset = Arr::get($validated, 'offset', 0);

        return response()->json(
            $this->list_resource_class::collection(
                $this->model_class
                    ::skip($offset)
                    ->take($limit)
                    ->get()
            )
        );
    }

    public function retrieve(int $id)
    {
        return response()
            ->json(
                new $this->resource_class(
                    $this->model_class::find($id)
                )
            );
    }
}
