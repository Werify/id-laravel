<?php

use Werify\IdLaravel\Http\Controllers\Api\V1\AuthController;

return
	[
		'version' => 'v1',
		'routes' =>
		[
			'group' => 'api/werify',
			'request-otp' => '/request-otp',
			'verify-otp' => '/verify-otp',
		],
		'controllers' =>
		[
			'AuthController' =>
			[
				'class' => AuthController::class,
				'request-otp' => 'requestOTP',
				'verify-otp' => 'verifyOTP',
			],

		],
		'api' =>
		[
			'base_path' => 'https://id.werify.net',
			'base_api_path' => 'https://id.werify.net/api',
			'request-otp' => 'request-otp',
			'verify-otp' => 'verify-otp',
			'profile' => 'user/profile',
			'profile-mobile-numbers' => 'user/profile/mobile-numbers',
			'profile-metas' => 'user/profile/metas',
			'profile-education' => 'user/profile/education',
			'profile-financial-information' => 'user/profile/financial-information'
		]
	];
