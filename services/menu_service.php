<?php

function get_base_menu(): array
{
	$base_menu = option('BASE_MENU');

	$fav_key = array_key_last($base_menu);
	$fav_title = array_pop($base_menu);

	$genres = get_genres();
	foreach (mysqli_fetch_all($genres) as $genre)
	{
		$base_menu['?genre=' . $genre[1]] = $genre[2];
	}

	$base_menu[$fav_key] = $fav_title;

	return $base_menu;
}