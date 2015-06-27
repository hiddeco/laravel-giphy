<?php namespace HiddeCo\Giphy\Facades;

/**
 * This file is a part of Laravel Giphy,
 * a Giphy API wrapper for Laravel and Lumen.
 *
 * @package HiddeCo\Giphy
 * @license MIT
 * @author  Hidde Beydals <hello@hidde.co>
 * @version 0.1
 */

use Illuminate\Support\Facades\Facade;

class Giphy extends Facade {

	protected static function getFacadeAccessor()
	{
		return 'HiddeCo\Giphy\Giphy';
	}
}
