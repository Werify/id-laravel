<?php

namespace Werify\IdLaravel\Jobs;

use Exception;

class RequestOTPJob extends BaseJob
{

	public function __construct(public string $identifier)
	{
	}
	public function handle()
	{
		$path = $this->generateUrl(config('auth-service.api.request-otp'));
		$payload = ['identifier' => $this->identifier];
		$request = $this->post($path, $payload);
		if ($request->status() === 200) {
			return $request->json();
		}
		throw new Exception('Request OTP Failed');
	}
}
