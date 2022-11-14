<?php

require_once __DIR__ . '/../boot.php';
/**
 * @var string $title
 * @var int $description_len
 * @var array $movies
 * @var array $genres
 * @var array $base_menu
 */
$favour = array_pop($base_menu);
foreach ($genres as $url => $genre)
{
	$base_menu['?genre=' . $genre] = $genre;
}
$base_menu[] = $favour;

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
