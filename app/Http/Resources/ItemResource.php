<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name'     => $this->pivot->name ?? $this->name,
            'type'     => $this->type->code,
            'subtype' => $this->subtype ? $this->subtype->code : null,
            'quantity' => $this->pivot->quantity,
            'equipped' => !!$this->pivot->equipped,
            'weight'   => $this->weight,
            'cost'     => $this->cost,
        ];
    }
}
