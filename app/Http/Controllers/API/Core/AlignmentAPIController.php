<?php

namespace App\Http\Controllers\API\Core;

use App\Http\Controllers\API\APIController;
use App\Models\Core\Alignment;
use App\Http\Resources\AlignmentResource;

class AlignmentAPIController extends APIController
{
    public $model_class = Alignment::class;
    public $resource_class = AlignmentResource::class;
    public $list_resource_class = AlignmentResource::class;
}
