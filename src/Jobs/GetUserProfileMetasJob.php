<?php

namespace Werify\IdLaravel\Jobs;

use Exception;

class GetUserProfileMetasJob extends BaseJob
{

	public function __construct(public string $token)
	{
	}
	public function handle()
	{
		$path = $this->generateUrl(config('auth-service.api.profile-metas'));
		$request = $this->get($path, $this->token);
		if ($request->status() === 200) {
			return $request->json();
		}
		throw new Exception('Failed to get profile metas');
	}
}
