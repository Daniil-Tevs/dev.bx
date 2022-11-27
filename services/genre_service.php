<?php

function get_genres()
{
	$connection = get_db_connection();
	$genres = mysqli_query($connection, "SELECT * FROM genre");
	return ($genres) ?: [];
}

function get_genre_id_by_url(string $url): int
{
	$connection = get_db_connection();
	$id = mysqli_query($connection, "SELECT ID FROM genre WHERE CODE = '$url'");
	$id = mysqli_fetch_assoc($id);
	return ($id) ? $id['ID'] : -1;
}

function get_genres_of_movie_id(int $id): array
{
	$connection = get_db_connection();
	$genres = mysqli_query($connection,
		"SELECT NAME FROM genre 
               WHERE ID IN (SELECT GENRE_ID FROM movie_genre WHERE MOVIE_ID = '{$id}')");
	$genres = mysqli_fetch_all($genres);
	return ($genres) ? array_map(fn ($genre): string => $genre[0], $genres) : [];
}