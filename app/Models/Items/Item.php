<?php

namespace App\Models\Items;

use App\Interfaces\ItemContainer;
use App\Traits\ModelFindByTrait;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use ModelFindByTrait;

    protected $table = 'items';

    public $timestamps = false;

    public function type()
    {
        return $this->belongsTo(ItemType::class);
    }

    public function subtype()
    {
        return $this->belongsTo(ItemSubtype::class);
    }

    public function modifiers() {
        return $this->morphMany(Modifier::class, 'object');
    }

    public function actions() {
        return $this->morphMany(Action::class, 'object');
    }

    public function getNameAttribute() {
        if (
            $this->pivot &&
            $this->pivot->name
        ) {
            return $this->pivot->name;
        }

        return $this->attributes['name'];
    }

    public function getQuantityAttribute() {
        if (!$this->pivot) {
            return 0;
        }

        return $this->pivot->quantity;
    }

    public function getEquippedAttribute() {
        if (!$this->pivot) {
            return false;
        }

        return $this->pivot->equipped;
    }

    public function giveTo(
        ItemContainer $container,
        int $quantity = 1
    ) {
        $container->give(
            $this,
            $quantity
        );
    }

    public function takeFrom(
        ItemContainer $container,
        int $quantity = 1
    ) {
        $container->take(
            $this,
            $quantity
        );
    }
}
