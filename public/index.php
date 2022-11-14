<?php

require_once __DIR__ . '/../boot.php';
/**
 * @var string $title
 * @var int $description_len
 * @var array $movies
 * @var array $base_menu
 */

if (isset($_GET['genre']))
{
	$movies = get_movies_by_genre((string)$_GET['genre'],$movies);
}
else
{
	$movie = [];
}

echo view('layout',[
	'title' => $title,
	'menu' => $base_menu,
	'content' => view('pages/index', [
		'movies' => $movies,
		])
]);
