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

interface StickerInterface {

	/**
	 * Searches for a sticker GIF and returns results.
	 *
	 * @param       $query
	 * @param array $params
	 *
	 * @return mixed
	 */
	public function search($query, array $params = [ ]);


	/**
	 * Translates a string to a sticker GIF and returns result.
	 *
	 * @param       $query
	 * @param array $params
	 *
	 * @return mixed
	 */
	public function translate($query, array $params = [ ]);


	/**
	 * Returns a random sticker GIF.
	 *
	 * @param array $params
	 *
	 * @return mixed
	 */
	public function random(array $params = [ ]);


	/**
	 * Returns trending sticker GIFs.
	 *
	 * @param array $params
	 *
	 * @return mixed
	 */
	public function trending(array $params = [ ]);
}
