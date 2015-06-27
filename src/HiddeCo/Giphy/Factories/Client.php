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

use HiddeCo\Giphy\Contracts\ClientInterface;
use GuzzleHttp\Client as HttpClient;

class Client implements ClientInterface {

	/**
	 * @var HttpClient
	 */
	protected $client;


	/**
	 * @param $baseUrl
	 * @param $apiKey
	 */
	public function __construct($baseUrl, $apiKey)
	{
		$this->client = new HttpClient([
			'base_url' => $baseUrl,
			'defaults' => [
				'query' => [ 'api_key' => $apiKey ]
			]
		]);
	}


	/**
	 * @param       $endPoint
	 * @param array $params
	 *
	 * @return mixed
	 * @throws \Exception
	 */
	public function get($endPoint, array $params = [ ])
	{
		$response = $this->client->get($endPoint, [ 'query' => $params ]);

		switch ($response->getHeader('content-type'))
		{
			case "application/json":
				return $response->json();
				break;
			default:
				return $response->getBody()->getContents();
		}
	}
}
