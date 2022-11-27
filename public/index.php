<?php

require_once __DIR__ . '/../boot.php';

$movies = get_movies();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$movie_title = trim($_POST['title']);
	if (strlen($movie_title) > 0)
	{
		$movies = get_movie_like_title($movie_title);
	}
	else
	{
		redirect('/');
	}
}

if (isset($_GET['genre']))
{
	$movies = get_movies_by_genre_url($_GET['genre']);
}

echo view('layout', [
	'title' => option('APP_NAME'),
	'menu' => get_base_menu(),
	'content' => view('pages/index', [
		'movies' => $movies,
	]),
]);
