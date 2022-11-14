<?php

const ROOT = __DIR__;

require_once  __DIR__ . '/config.php';
require_once __DIR__ . '/movie/data.php';
require_once  __DIR__ . '/services/index.php';

/**
 * @var array $base_menu
 * @var array $genres
 */
$fav_key = array_key_last($base_menu);
$fav_title = array_pop($base_menu);
foreach ($genres as $url => $genre)
{
	$base_menu['?genre=' . $genre] = $genre;
}
$base_menu[$fav_key] = $fav_title;
