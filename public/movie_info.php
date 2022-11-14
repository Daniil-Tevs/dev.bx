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
	$base_menu['?gender=' . $url] = $genre;
}
$base_menu[] = $favour;


if (isset($_GET['id']))
{
	$movie = get_movies_by_id((int)$_GET['id'],$movies);
}
elseif (isset($_GET['gender']))
{
	redirect(sprintf('/gender=%s',$_GET['gender']));
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
	])
]);
