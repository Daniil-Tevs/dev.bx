<?php

const ROOT = __DIR__;

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/movie/data.php';
require_once __DIR__ . '/services/index.php';

/**
 * @var array $genres
 */

$base_menu = option('BASE_MENU');

$fav_key = array_key_last($base_menu);
$fav_title = array_pop($base_menu);

foreach ($genres as $url => $genre)
{
	$base_menu['?genre=' . $url] = $genre;
}

$base_menu[$fav_key] = $fav_title;
