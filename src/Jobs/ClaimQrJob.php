<?php

namespace Werify\IdLaravel\Jobs;

use Exception;

class ClaimQRJob extends BaseJob
{

	public function __construct(public string $token,public string $id,public string $hash)
	{
	}
	public function handle()
	{
		$path = $this->generateUrl(config('werify-auth-service.api.qr-claim').$this->id.'/'.$this->hash);
		$request = $this->get($path,$this->token);

		if ($request->status() === 200) {
			return $request->json();
		}
		throw new Exception('Request QR Failed');
	}
}
