<?php

namespace App\Models\Core;

use App\Traits\ModelFindByTrait;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use ModelFindByTrait;

    protected $table = 'sizes';

    public $timestamps = false;
}
