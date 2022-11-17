<?php

require_once __DIR__ . '/../boot.php';
/**
 * @var string $title
 * @var array $movies
 * @var array $genres
 * @var array $base_menu
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$movie_title = trim($_POST['title']);
	if (strlen($movie_title) > 0)
	{
		$movie_id = get_movie_id_by_title($movie_title,$movies);
		redirect('/movie_info.php'."?id=$movie_id");
	}
	else
	{
		redirect('/');
	}
}
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
