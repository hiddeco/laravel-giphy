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

interface GifInterface {

	/**
	 * Searches for a GIF.
	 *
	 * @param       $query
	 * @param array $params
	 *
	 * @return mixed
	 */
	public function search($query, array $params = [ ]);


	/**
	 * Returns a GIF by id.
	 *
	 * @param $id
	 *
	 * @return mixed
	 */
	public function get($id);


	/**
	 * Returns multiple GIFs by their ids.
	 *
	 * @param array $ids
	 *
	 * @return mixed
	 */
	public function getMultiple(array $ids);


	/**
	 * Translates a string to a GIF and returns result.
	 *
	 * @param       $query
	 * @param array $params
	 *
	 * @return mixed
	 */
	public function translate($query, array $params = [ ]);


	/**
	 * Returns a random GIF.
	 *
	 * @param array $params
	 *
	 * @return mixed
	 */
	public function random(array $params = [ ]);


	/**
	 * Returns trending GIFs.
	 *
	 * @param array $params
	 *
	 * @return mixed
	 */
	public function trending(array $params = [ ]);
}
