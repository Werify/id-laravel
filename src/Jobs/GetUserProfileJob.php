<?php

namespace Werify\IdLaravel\Jobs;

use Exception;

class GetUserProfileJob extends BaseJob
{

	public function __construct(public string $token)
	{
	}
	public function handle()
	{
		$path = $this->generateUrl(config('werify-auth-service.api.profile'));
		$request = $this->get($path, $this->token);
		if ($request->status() === 200) {
			return $request->json()['results'] ?? $request->json();
		}
		throw new Exception('Failed to get profile');
	}
}
