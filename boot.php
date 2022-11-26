<?php

const ROOT = __DIR__;

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/movie/data.php';
require_once __DIR__ . '/services/index.php';



$base_menu = option('BASE_MENU');

$fav_key = array_key_last($base_menu);
$fav_title = array_pop($base_menu);

$genres = get_genres();
foreach (mysqli_fetch_all($genres) as $genre)
{
	$base_menu['?genre=' . $genre[1]] = $genre[2];
}

$base_menu[$fav_key] = $fav_title;
