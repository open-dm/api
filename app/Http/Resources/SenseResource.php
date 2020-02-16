<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SenseResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name'     => $this->name,
            'code'     => $this->code,
            'distance' => $this->pivot->distance,
        ];
    }
}
