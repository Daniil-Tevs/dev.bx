<?php

function format_time(int $min): string
{
	return date('H:i', mktime(0, $min))??"0";
}

function format_description(string $description, int $len = 310): string
{
	return (strlen($description) > $len) ? substr($description, 0, 320) . "..." : $description;
}

function get_movies()
{
	$connection = get_db_connection();
	$movies = mysqli_query($connection, "SELECT * FROM movie");
	return ($movies) ? $movies : [];
}

function get_movies_by_id(int $id, array $movies): array
{
	foreach ($movies as $movie)
	{
		if ($movie['id'] === $id)
		{
			return $movie;
		}
	}
	return [];
}

function get_movies_by_genre_url(string $genre)
{
	$genre_id = get_genre_id_by_url(sql_protect_str($genre));

	$connection = get_db_connection();

	$query_get_movie_id = "SELECT MOVIE_ID FROM movie_genre WHERE GENRE_ID = {$genre_id}";
	$movies_of_genre = mysqli_query($connection,
		"SELECT * FROM movie WHERE ID IN ({$query_get_movie_id})");

	return ($movies_of_genre) ?: [];
}

function get_movie_id_by_title(string $title, array $movies): int
{
	foreach ($movies as $movie)
	{
		if ($movie['title'] === $title || $movie['original_title'] === $title)
		{
			return $movie['id'];
		}
	}
	return -1;
}