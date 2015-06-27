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

class Giphy {

	protected $client;


	public function __construct(Factories\Client $client)
	{
		$this->client = $client;
	}


	/**
	 * @return Factories\Gif
	 */
	public function gif()
	{
		return new Factories\Gif($this->client);
	}


	/**
	 * @return Factories\Sticker
	 */
	public function sticker()
	{
		return new Factories\Sticker($this->client);
	}
}