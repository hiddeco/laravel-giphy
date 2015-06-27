<?php namespace HiddeCo\Giphy;

/**
 * This file is a part of Laravel Giphy,
 * a Giphy API wrapper for Laravel and Lumen.
 *
 * @package HiddeCo\Giphy
 * @license MIT
 * @author  Hidde Beydals <hello@hidde.co>
 * @version 0.1
 */

use Illuminate\Support\ServiceProvider;

class GiphyServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->setupConfig();
	}


	/**
	 * Setup the config.
	 *
	 * @return void
	 */
	protected function setupConfig()
	{
		$source = realpath(__DIR__ . '/../../config/giphy.php');

		if ( class_exists('Illuminate\Foundation\Application', false) )
		{
			$this->publishes([ $source => config_path('giphy.php') ], 'config');
		}

		$this->mergeConfigFrom($source, 'giphy');
	}


	/**
	 * Register bindings in the container.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('giphy', function ($app)
		{
			$config = $app['config']->get('giphy');
			$client = new Factories\Client($config['baseUrl'], $config['apiKey']);

			return new Giphy($client);
		});

		$this->app->alias('giphy', 'HiddeCo\Giphy\Giphy');
	}
}