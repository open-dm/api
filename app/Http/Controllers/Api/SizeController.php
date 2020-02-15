<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController;
use App\Models\Core\Size;
use App\Http\Resources\SizeResource;

class SizeController extends ApiController
{
    public $model_class = Size::class;
    public $resource_class = SizeResource::class;
}
