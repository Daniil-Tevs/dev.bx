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

function get_movie_by_id(int $id)
{
	$connection = get_db_connection();
	$movie = mysqli_query($connection, "SELECT * FROM movie WHERE ID = '$id'");
	return ($movie) ?: [];
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

function get_movie_like_title(string $title)
{
	$title = sql_protect_str($title);
	$connection = get_db_connection();
	$movies = mysqli_query($connection, "SELECT * FROM movie WHERE TITLE LIKE '%$title%' OR ORIGINAL_TITLE LIKE '%$title%'");
	return ($movies) ? $movies : [];
}