<?php

namespace App\Models\Core;

use App\Traits\EnsureModelTrait;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use EnsureModelTrait;

    protected $table = 'sizes';
}
