<?php

namespace Werify\IdLaravel\Http\Middlewares;

use Closure;
use Exception;
use Werify\IdLaravel\Jobs\GetUserProfileJob;
use Illuminate\Support\Facades\Cache;
use Throwable;

class WerifyAuthMiddleware
{
	public function handle($request, Closure $next)
	{
		$token = $request->header('authorization');
		$profile = [];
		try {
			$profile = Cache::remember('profile_for_' . md5($token), 60, function () use ($token) {
				return dispatch_sync(new GetUserProfileJob($token));
			});
		} catch (Exception  | Throwable $e) {
			abort(401);
		}

        $request->user = $profile;
		$request->setUserResolver(fn() => $profile);
		$request = $request->merge($profile);

		return $next($request);
	}
}
