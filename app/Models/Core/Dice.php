<?php

namespace App\Models\Core;

use App\Traits\ModelFindByTrait;
use Illuminate\Database\Eloquent\Model;

class Dice extends Model
{
    use ModelFindByTrait;

    protected $table = 'dice';

    public $timestamps = false;
}
