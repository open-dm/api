<?php

namespace App\Models\Core;

use App\Traits\ModelFindByTrait;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use ModelFindByTrait;

    protected $table = 'challenges';
}
