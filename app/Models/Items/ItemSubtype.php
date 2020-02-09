<?php

namespace App\Models\Items;

use Illuminate\Database\Eloquent\Model;

class ItemSubtype extends Model
{
    protected $table = 'item_subtypes';

    public $timestamps = false;

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
