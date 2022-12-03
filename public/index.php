<?php

require_once __DIR__ . '/../boot.php';

$movies = [];

if (isset($_GET['title']))
{
	$movie_title = trim($_GET['title']);
	if (strlen($movie_title) > 0)
	{
		$movies = get_movies_like_title($movie_title);
	}
	else
	{
		redirect('/');
	}
}
elseif (isset($_GET['genre']))
{
	$movies = get_movies_by_genre_code($_GET['genre']);
}
else
{
	$movies = get_movies_with_full_info();
}

echo view('layout', [
	'title' => option('APP_NAME'),
	'menu' => get_base_menu(),
	'content' => view('pages/index', [
		'movies' => $movies,
	]),
]);
