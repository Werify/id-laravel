<?php

namespace Werify\IdLaravel\Jobs;

use Exception;

class RequestQRImageJob extends BaseJob
{

	public function __construct(public string $id,public string $hash)
	{
	}
	public function handle()
	{
		$path = $this->generateUrl(config('werify-auth-service.api.qr-image').'/'.$this->id.'/'.$this->hash);
		$request = $this->get($path);
        return $request->body();
	}
}
