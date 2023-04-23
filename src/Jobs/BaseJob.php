<?php

namespace Werify\IdLaravel\Jobs;

use Illuminate\Support\Facades\Http;

class BaseJob
{
	public function generateUrl(string $path): string
	{
		return config('werify-auth-service.api.base_api_path') . '/' . config('werify-auth-service.version') . '/' . $path;
	}

	public function post($path, $payload, $token = null)
	{
		$request = Http::withHeaders($this->getHeaders($token))->post($path, $payload);
		return $request;
	}

	public function get($path, $token = null)
	{
		$request = Http::withHeaders($this->getHeaders($token))->get($path);
		return $request;
	}

	protected function getHeaders($token = null)
	{
		$headers =
			[
				'accept' => 'application/json',
				'content-type' => 'application/json',
				'api-key' => config('werify-auth-service.app_key')
			];

		if ($token) {
			$headers['Authorization'] = "Bearer " . $token;
		}

		return $headers;
	}
}
