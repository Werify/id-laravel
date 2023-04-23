<?php

namespace Werify\IdLaravel\Providers;

use Illuminate\Support\ServiceProvider;

class WerifyIDServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');

		if ($this->app->runningInConsole()) {
			$this->publishes([
				__DIR__ . '/../Config/config.php' => config_path('werify-auth-service.php'),
			], 'config');
		}
	}

	public function register()
	{
		$this->mergeConfigFrom(__DIR__ . '/../Config/config.php', 'werify-auth-service');
	}
}
