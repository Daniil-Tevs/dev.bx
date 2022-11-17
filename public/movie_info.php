<?php

require_once __DIR__ . '/../boot.php';
/**
 * @var string $title
 * @var array $movies
 * @var array $base_menu
 */

if (isset($_GET['id']))
{
	$movie = get_movies_by_id((int)$_GET['id'], $movies);
}
elseif (isset($_GET['genre']))
{
	redirect(sprintf('/genre=%s', $_GET['genre']));
}
else
{
	$movie = [];
}

echo view('layout', [
	'title' => $title,
	'menu' => $base_menu,
	'content' => view('pages/movie_info', [
		'movies' => $movie,
	]),
]);
