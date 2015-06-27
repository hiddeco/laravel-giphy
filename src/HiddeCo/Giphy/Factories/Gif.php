<?php namespace HiddeCo\Giphy\Factories;

/**
 * This file is a part of Laravel Giphy,
 * a Giphy API wrapper for Laravel and Lumen.
 *
 * @package HiddeCo\Giphy
 * @license MIT
 * @author  Hidde Beydals <hello@hidde.co>
 * @version 0.1
 */

use HiddeCo\Giphy\Contracts\Gif as GifContract;

class Gif implements GifContract {

	public function __construct(Client $client)
	{
		$this->client = $client;
	}


	/**
	 * Searches all GIFs for a word or phrase,
	 * punctuation will be ignored by the API.
	 *
	 * Optional parameters:
	 *    - limit
	 *    - offset
	 *    - rating
	 *    - fmt
	 *
	 * @param       $query
	 * @param array $params
	 *
	 * @return mixed
	 */
	public function search($query, array $params = [ ])
	{
		$params['q'] = $query;

		return $this->client->get("gifs/search", $params);
	}


	/**
	 * Returns meta data about a GIF by id.
	 *
	 * @param $id
	 *
	 * @return mixed
	 */
	public function get($id)
	{
		return $this->client->get("gifs/$id");
	}


	/**
	 * Returns meta data about multiple GIFs by id.
	 *
	 * @param array $ids
	 *
	 * @return mixed
	 */
	public function getMultiple(array $ids)
	{
		$params = [ 'ids' => implode(",", $ids) ];

		return $this->client->get("gifs", $params);
	}


	/**
	 * Returns GIFs from the Giphy 'translation engine',
	 * searches for a keyword and returns GIF translations.
	 *
	 * Optional parameters:
	 *    - rating
	 *    - fmt
	 *
	 * @param       $query
	 * @param array $params
	 *
	 * @return mixed
	 */
	public function translate($query, array $params = [ ])
	{
		$params['s'] = $query;

		return $this->client->get("gifs/translate", $params);
	}


	/**
	 * Returns a random GIF,
	 * limitation possible by using the tag parameter.
	 *
	 * Optional parameters:
	 *    - tag
	 *    - rating
	 *    - fmt
	 *
	 * @param array $params
	 *
	 * @return mixed
	 */
	public function random(array $params = [ ])
	{
		return $this->client->get("gifs/random", $params);
	}


	/**
	 * Fetches currently trending GIFs.
	 *
	 * Optional parameters:
	 *    - limit
	 *    - rating
	 *    - fmt
	 *
	 * @param array $params
	 *
	 * @return mixed
	 */
	public function trending(array $params = [ ])
	{
		return $this->client->get("gifs/trending", $params);
	}
}