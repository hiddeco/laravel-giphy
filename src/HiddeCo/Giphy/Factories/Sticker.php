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

use HiddeCo\Giphy\Contracts\Sticker as StickerContract;

class Sticker implements StickerContract {

	public function __construct(Client $client)
	{
		$this->client = $client;
	}


	/**
	 * Searches all sticker GIFs for a word or phrase,
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

		return $this->client->get("stickers/search", $params);
	}


	/**
	 * Returns sticker GIFs from the Giphy 'translation engine',
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

		return $this->client->get("stickers/translate", $params);
	}


	/**
	 * Returns a random sticker GIF,
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
		return $this->client->get("stickers/random", $params);
	}


	/**
	 * Fetches currently trending sticker GIFs.
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
		return $this->client->get("stickers/trending", $params);
	}
}