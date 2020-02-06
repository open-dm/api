<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiListRequest;

abstract class AbstractAPIController extends Controller
{
  abstract function list(ApiListRequest $request);
  abstract function retrieve(int $id);
  // abstract function update(int $id, array $options);
}
