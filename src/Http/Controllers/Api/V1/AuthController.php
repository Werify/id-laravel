<?php

namespace Werify\IdLaravel\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Werify\IdLaravel\Jobs\RequestOTPJob;
use Werify\IdLaravel\Jobs\RequestQRImageJob;
use Werify\IdLaravel\Jobs\RequestQRJob;
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
		return dispatch_sync(new RequestOTPJob($request['identifier']));
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
		return dispatch_sync(new VerifyOTPJob($request['id'], $request['hash'], $request['otp']));
	}

	public function qr(Request $request)
	{
		return dispatch_sync(new RequestQRJob());
	}
	public function qrImage(Request $request)
	{
		$result = dispatch_sync(new RequestQRJob());
		$id = $result['results']['id'];
		$hash = $result['results']['hash'];
		return dispatch_sync(new RequestQRImageJob($id,$hash));
	}
}
