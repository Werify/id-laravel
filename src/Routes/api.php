<?php

use Illuminate\Support\Facades\Route;
use Werify\IdLaravel\Http\Controllers\Api\V1\AuthController;

Route::group(['prefix' => config('auth-service.routes.group')], function () {
	Route::get(config('auth-service.routes.request-otp'), [config('auth-service.controllers.AuthController.class'), config('auth-service.controllers.AuthController.request-otp')]);
	Route::get(config('auth-service.routes.verify-otp'), [config('auth-service.controllers.AuthController.class'), config('auth-service.controllers.AuthController.verify-otp')]);
});
