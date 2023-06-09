<?php

use Illuminate\Support\Facades\Route;
use Werify\IdLaravel\Http\Controllers\Api\V1\AuthController;
use Werify\IdLaravel\Http\Middlewares\WerifyAuthMiddleware;

Route::group(['prefix' => config('werify-auth-service.routes.group')], function () {
	Route::post(config('werify-auth-service.routes.request-otp'), [config('werify-auth-service.controllers.AuthController.class'), config('werify-auth-service.controllers.AuthController.request-otp')]);
	Route::post(config('werify-auth-service.routes.verify-otp'), [config('werify-auth-service.controllers.AuthController.class'), config('werify-auth-service.controllers.AuthController.verify-otp')]);
	Route::get(config('werify-auth-service.routes.qr'), [config('werify-auth-service.controllers.AuthController.class'), config('werify-auth-service.controllers.AuthController.qr')]);
	Route::get(config('werify-auth-service.routes.qr-image'), [config('werify-auth-service.controllers.AuthController.class'), config('werify-auth-service.controllers.AuthController.qr-image')]);
	Route::post(config('werify-auth-service.routes.qr-claim'), [config('werify-auth-service.controllers.AuthController.class'), config('werify-auth-service.controllers.AuthController.qr-claim')])->middleware([WerifyAuthMiddleware::class]);
});
