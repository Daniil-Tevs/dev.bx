<?php

require_once __DIR__ . '/../boot.php';

$movie = [];

if (isset($_GET['id']))
{
	$movie = get_movie_by_id((int)$_GET['id']);
}
elseif (isset($_GET['genre']))
{
	redirect(sprintf('/?genre=%s', $_GET['genre']));
}

echo view('layout', [
	'title' => option('APP_NAME'),
	'menu' => get_base_menu(),
	'content' => view('pages/movie_info', [
		'movie' => $movie,
	]),
]);
