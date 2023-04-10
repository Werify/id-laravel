<?php

namespace Werify\IdLaravel\Jobs;

use Exception;

class VerifyOTPJob extends BaseJob
{

	public function __construct(public string $id, public string $hash, public string $otp)
	{
	}
	public function handle()
	{
		$path = $this->generateUrl(config('werify-auth-service.api.verify-otp'));
		$payload = ['id' => $this->id, 'hash' => $this->hash, 'otp' => $this->otp];
		$request = $this->post($path, $payload);

		if ($request->status() === 200) {
			return $request->json();
		}
		throw new Exception('Verify OTP Failed');
	}
}
