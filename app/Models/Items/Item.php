<?php

namespace App\Models\Items;

use App\Models\Characters\Monster;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    public $timestamps = false;

    public function character()
    {
        // TODO - Either merge monsters into the characters table
        // TODO - Remove this relation
        // TODO - Or make it polymorphic
        return $this->belongsToMany(Monster::class);
    }

    public function type()
    {
        return $this->belongsTo(ItemType::class);
    }

    public function subtype()
    {
        return $this->belongsTo(ItemType::class);
    }

    public function modifiers() {
        return $this->morphMany(Modifier::class, 'object');
    }
}
