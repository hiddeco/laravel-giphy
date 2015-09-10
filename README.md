Laravel Giphy
=============
![LARAVEL GIPHY](https://media4.giphy.com/media/ES4Vcv8zWfIt2/giphy.gif)

Laravel Giphy is a [Giphy API](https://api.giphy.com) wrapper for Laravel (and Lumen but ssh, don't tell anyone), providing an easy to access `Giphy` facade.

## Installation
To use this package without running in to trouble you will need PHP 5.5+ or HHVM 3.6+, and Composer.

1. Get the latest version of Laravel Giphy, add the following line to your `composer.json` file

	````"hiddeco/laravel-giphy": "0.1.*@alpha"````

2. Run `composer update` or `composer install`

3. Register the Laravel Giphy service provider in `config/app.php` by adding
`'HiddeCo\Giphy\GiphyServiceProvider` to the providers key

4. Add the `Giphy` facade to the `aliases` key: `'Giphy'	=> 'HiddeCo\Giphy\Facades\Giphy'`

## Configuration
The only configuration Laravel Giphy needs is a `GIPHY_API_KEY` in your `.env` file. A public beta key is available in the [Giphy API Documentation](https://github.com/giphy/GiphyAPI).

*Note: On Laravel it is also possible to configure Laravel Giphy by running `php artisan config:publish` and adding your `apiKey` to `config/giphy.php`.*

## Injecting `Giphy`
Injecting `Giphy` in to a controller could not have been any easier.

````php
<?php

class GifController extends BaseController {

	public function __construct(HiddeCo\Giphy\Giphy $giphy)
    {

		$this->giphy = $giphy;

	}

  	public function get($id)
   	{
		try
		{

			return $this->giphy->gif()->random([ 'fmt' => 'html' ]);
		}
		catch (\Exception $e)
		{

			return $e->getMessage();
		}
    }
}
````

## The API
Using this package to communicate with the Giphy API is fairly simple by using the `Giphy` facade.

### Giphy: GIFs
Do you want to find a sweet GIF based on a keyword, translate a keyword to just one GIF or just get a random GIF? It is all possible.

#### Giphy::gif->search($query, $params = [])
Searches all GIFs for the provided word or phrase and accepts 4 optional parameters as array.
- **limit:** default 25 (max: 100)
- **offset**
- **rating:** limit results by rating (y,g, pg, pg-13 or r)
- **fmt:** returned format, json or html (default: json)
````php
Giphy::gif()->search('code', [limit' => 10, 'offset' => 10, 'rating' => 'g', 'fmt' => 'html']);
````

#### Gipgy::gif()->get($id)
Returns JSON meta data about a GIF by id.
````php
Giphy::gif()->get('4hnQDVKVARZ6w');
````

#### Giphy::gif()->getMultiple($ids = [])
Returns JSON meta data about mulitple GIFs by id.
````php
Giphy::gif()->getMultiple(['4hnQDVKVARZ6w', 'Ro2MgOxH9iaVG']);
````

#### Giphy::gif()->translate($query, $params = [])
Returns a GIF from the Giphy 'translation engine', enter a keyword and get a GIF translation back. Accepts 2 optional parameters.
- **rating:** limit results by rating (y,g, pg, pg-13 or r)
- **fmt:** returned format, json or html (default: json)
````php
Giphy::gif()->translate($query, ['rating' => 'g', 'fmt' => 'html']);
````

#### Giphy::gif()->random($params = [])
Returns a random GIF, limitation is possible by using the following optional parameters.
- **tag**: get a random GIF based on the keyword
- **rating:** limit results by rating (y,g, pg, pg-13 or r)
- **fmt:** returned format, json or html (default: json)

````php
Giphy::gif()->random(['tag' => 'cats', 'rating' => 'g', 'fmt' => 'html']);
````

#### Giphy::gif()->trending($params = [])
Returns currently trending GIFs on the internet. Accepts 3 optional parameters.
- **limit:** default 25 (max: 100)
- **rating:** limit results by rating (y,g, pg, pg-13 or r)
- **fmt:** returned format, json or html (default: json)

````php
Giphy::gif()->trending(['limit' => 100, 'rating' => 'pg', 'fmt' => 'html');
````

### Giphy: Stickers
Giphy stickers are animated stickers (animated GIFs with transparent backgrounds).

#### Giphy::sticker()->search($query, $params = [])
Searches all sticker GIFs for the provided word or phrase and accepts 4 optional parameters as array.
- **limit:** default 25 (max: 100)
- **offset**
- **rating:** limit results by rating (y,g, pg, pg-13 or r)
- **fmt:** returned format, json or html (default: json)
````php
Giphy::sticker()->search('code', [limit' => 10, 'offset' => 10, 'rating' => 'g', 'fmt' => 'html']);
````

#### Giphy::sticker()->translate($query, $params = [])
Returns a sticker GIF from the Giphy 'translation engine', enter a keyword and get a sticker GIF translation back. Accepts 2 optional parameters.
- **rating:** limit results by rating (y,g, pg, pg-13 or r)
- **fmt:** returned format, json or html (default: json)
````php
Giphy::sticker()->translate($query, ['rating' => 'g', 'fmt' => 'html']);
````

#### Giphy::sticker()->random($params = [])
Returns a random sticker GIF, limitation is possible by using the following optional parameters.
- **tag**: get a random GIF based on the keyword
- **rating:** limit results by rating (y,g, pg, pg-13 or r)
- **fmt:** returned format, json or html (default: json)

````php
Giphy::sticker()->random(['tag' => 'cats', 'rating' => 'g', 'fmt' => 'html]);
````

#### Giphy::sticker()->trending($params = [])
Returns currently trending sticker GIFs on the internet. Accepts 3 optional parameters.
- **limit:** default 25 (max: 100)
- **rating:** limit results by rating (y,g, pg, pg-13 or r)
- **fmt:** returned format, json or html (default: json)

````php
Giphy::sticker()->trending(['limit' => 100, 'rating' => 'pg', 'fmt' => 'html']);
````

## License
Laravel Giphy is licensed under the [MIT License (MIT)](https://github.com/hiddeco/laravel-giphy/blob/master/LICENSE).
