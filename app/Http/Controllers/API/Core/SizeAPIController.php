<?php

namespace App\Http\Controllers\API\Core;

use App\Http\Controllers\API\APIController;
use App\Models\Core\Size;
use App\Http\Resources\SizeResource;

class SizeAPIController extends APIController
{
    public $model_class = Size::class;
    public $resource_class = SizeResource::class;
    public $list_resource_class = SizeResource::class;
}
