<?php

namespace App\Models\Core;

use App\Traits\EnsureModelTrait;
use Illuminate\Database\Eloquent\Model;

class Alignment extends Model
{
    use EnsureModelTrait;

    protected $table = 'alignments';
}
