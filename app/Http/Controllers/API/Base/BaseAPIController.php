<?php

namespace App\Http\Controllers\API\Base;

use App\Http\Controllers\Controller;

abstract class BaseAPIController extends Controller
{
  abstract function list();
  abstract function retrieve(int $id);
  // abstract function update(int $id, array $options);
}
