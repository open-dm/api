<?php

namespace App\Models\Items;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    public function type()
    {
        return $this->belongsTo(ItemType::class);
    }

    public function subtype()
    {
        return $this->belongsTo(ItemType::class);
    }

    public function modifiers() {
        return $this->hasMany(
            Modifier::class,
            'object_id'
        )
            ->where('object_class', self::class);
    }
}
