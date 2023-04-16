<?php

use Illuminate\Support\Facades\Route;
use Werify\IdLaravel\Http\Controllers\Api\V1\AuthController;

Route::group(['prefix' => config('werify-auth-service.routes.group')], function () {
	Route::post(config('werify-auth-service.routes.request-otp'), [config('werify-auth-service.controllers.AuthController.class'), config('werify-auth-service.controllers.AuthController.request-otp')]);
	Route::post(config('werify-auth-service.routes.verify-otp'), [config('werify-auth-service.controllers.AuthController.class'), config('werify-auth-service.controllers.AuthController.verify-otp')]);
});
