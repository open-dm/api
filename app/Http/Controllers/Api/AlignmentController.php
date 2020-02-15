<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController;
use App\Models\Core\Alignment;
use App\Http\Resources\AlignmentResource;

class AlignmentController extends ApiController
{
    public $model_class = Alignment::class;
    public $resource_class = AlignmentResource::class;
}
