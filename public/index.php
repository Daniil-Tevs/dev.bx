<?php

require_once __DIR__ . '/../boot.php';
/**
 * @var string $title
 * @var array $movies
 * @var array $genres
 * @var array $base_menu
 */

if (isset($_GET['genre']))
{
	$genre = get_title_of_genre((string)$_GET['genre'],$genres);
	$movies = get_movies_by_title_of_genre($genre, $movies);
}

echo view('layout', [
	'title' => $title,
	'menu' => $base_menu,
	'content' => view('pages/index', [
		'movies' => $movies,
	]),
]);
