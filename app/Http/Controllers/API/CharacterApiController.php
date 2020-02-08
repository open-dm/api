<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiCreateRequest;
use App\Http\Requests\ApiListRequest;
use Illuminate\Support\Arr;

class CharacterApiController extends Controller
{
    public function create(ApiCreateRequest $request)
    {
        $validated = $request->validated();

        // TODO - Change this to use ->create() method on the class
        $model = new $this->model_class(
            Arr::only(
                $validated,
                [
                    'name',
                    'size',
                    'alignment',
                    'challenge',
                ]
            )
        );

        dd($model);
        
        $model->save();

        return response()
            ->json(
                new $this->resource_class(
                    $model
                )
            );
    }

    public function list(ApiListRequest $request)
    {
        $validated = $request->validated();

        $limit  = Arr::get($validated, 'limit', 100);
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
