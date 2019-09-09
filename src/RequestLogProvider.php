<?php
namespace Qnn\RequestLog;

use Illuminate\Support\ServiceProvider;


class RequestLogProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// 发布配置文件
		$this->publishes([
			__DIR__.'/config/logRequestDB.php' => config_path('logRequestDB.php'),
		]);
	}
	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('RequestLog', function ($app) {
			return new LogDb();
		});
	}
	
	
	
}