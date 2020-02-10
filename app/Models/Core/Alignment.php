<?php

namespace App\Models\Core;

use App\Traits\ModelFindByTrait;
use Illuminate\Database\Eloquent\Model;

class Alignment extends Model
{
    use ModelFindByTrait;

    protected $table = 'alignments';

    public $timestamps = false;
}
