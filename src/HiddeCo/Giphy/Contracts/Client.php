<?php namespace HiddeCo\Giphy\Contracts;

/**
 * This file is a part of Laravel Giphy,
 * a Giphy API wrapper for Laravel and Lumen.
 *
 * @package HiddeCo\Giphy
 * @license MIT
 * @author  Hidde Beydals <hello@hidde.co>
 * @version 0.1
 */
interface Client {

	/**
	 * @param       $endPoint
	 * @param array $options
	 *
	 * @return mixed
	 */
	public function get($endPoint, array $options = [ ]);
}