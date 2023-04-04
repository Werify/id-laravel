<?php

namespace Werify\IdLaravel\Jobs;

use Exception;

class GetUserProfileNumbersJob extends BaseJob
{

	public function __construct(public string $token)
	{
	}
	public function handle()
	{
		$path = $this->generateUrl(config('auth-service.api.profile-mobile-numbers'));
		$request = $this->get($path, $this->token);
		if ($request->status() === 200) {
			return $request->json();
		}
		throw new Exception('Failed to get profile numbers');
	}
}
