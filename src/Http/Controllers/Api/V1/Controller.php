<?php

namespace Werify\IdLaravel\Http\Controllers\Api\V1;

use App\Concerns\ApiResponse;
use App\Traits\KeyCloakTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ApiResponse, KeyCloakTrait;
}
