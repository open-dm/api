<?php

namespace App\Models\Items;

use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    protected $table = 'item_types';

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
