<?php

namespace Werify\IdLaravel\Jobs;

use Exception;

class RequestQRJob extends BaseJob
{

	public function __construct()
	{
	}
	public function handle()
	{
		$path = $this->generateUrl(config('werify-auth-service.api.qr'));
		$request = $this->get($path);
		if ($request->status() === 200) {
			return $request->json();
		}
		throw new Exception('Request QR Failed');
	}
}
