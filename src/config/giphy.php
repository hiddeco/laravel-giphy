<?php

	/*
	| -----------------------------------------------------------------------------
	| Giphy API Config Settings
	| -----------------------------------------------------------------------------
	|
	*/
	return [
		'baseUrl'	=> env('GIPHY_BASE_URL') ? env('GIPHY_BASE_URL') : 'https://api.giphy.com/v1/',
		'apiKey'	=> env('GIPHY_API_KEY')
	];