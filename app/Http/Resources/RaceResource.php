<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RaceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'code' => $this->code,
        ];
    }
}
