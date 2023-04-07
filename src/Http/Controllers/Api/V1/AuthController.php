<?php

namespace Werify\IdLaravel\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Werify\IdLaravel\Jobs\RequestOTPJob;
use Werify\IdLaravel\Jobs\VerifyOTPJob;

class AuthController extends Controller
{
	public function requestOTP(Request $request)
	{
		$request = $this->validate(
			$request,
			[
				'identifier' => 'required|string'
			]
		);
		return dispatch_now(new RequestOTPJob($request['identifier']));
	}

	public function verifyOTP(Request $request)
	{
		$request = $this->validate(
			$request,
			[
				'id' => 'required|string',
				'hash' => 'required|string',
				'otp' => 'required|string'
			]
		);
		return dispatch_now(new VerifyOTPJob($request['id'], $request['hash'], $request['otp']));
	}
}