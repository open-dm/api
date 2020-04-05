<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    public function toArray($request)
    {
        $output = [
            'name'     => $this->name,
            'type'     => $this->type->code,
            'subtype'  => null,
            'quantity' => $this->quantity,
            'equipped' => $this->equipped,
            'weight'   => $this->weight,
            'cost'     => $this->cost,
        ];

        if ($this->subtype) {
            $output['subtype'] = $this->subtype->code;
        }

        return $output;
    }
}
