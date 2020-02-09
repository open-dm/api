<?php

namespace App\Models\Items;

use Illuminate\Database\Eloquent\Model;

class Modifier extends Model
{
    protected $table = 'modifiers';

    public function parent()
    {
        return $this->morphTo('object');
    }
}
