<?php

function get_genres()
{
	$connection = get_db_connection();
	$genres = mysqli_query($connection, "SELECT * FROM genre LIMIT 20");
	if (!$genres)
	{
		throw new Exception("Error: getting all genres from db -  return false");
	}
	return $genres;
}

function get_genre_id_by_code(string $url): int
{
	$connection = get_db_connection();
	$id = mysqli_query($connection, "SELECT ID FROM genre WHERE CODE = '$url'");
	if (!$id)
	{
		throw new Exception("Error: getting genre id by this code $url - return false");
	}
	$id = mysqli_fetch_assoc($id);
	return ($id) ? $id['ID'] : -1;
}

function get_genres_by_movie_id(int $id): array
{
	$connection = get_db_connection();
	$genres = mysqli_query($connection,
		"SELECT g.NAME FROM movie mov
               INNER JOIN genre g ON g.ID IN (SELECT GENRE_ID FROM movie_genre WHERE MOVIE_ID = mov.ID)
               WHERE mov.ID = $id");

	if (!$genres)
	{
		throw new Exception("Error: getting genres from db by this movie id {$id} - return false");
	}

	$genres = mysqli_fetch_all($genres);
	return array_map(fn ($genre): string => $genre[0], $genres);
}

function get_genres_sorted_by_id_movies(): array
{
	$connection = get_db_connection();
	$genres = mysqli_query($connection,
		"SELECT mov.ID, g.NAME FROM movie mov
               INNER JOIN genre g ON g.ID IN (SELECT GENRE_ID FROM movie_genre WHERE MOVIE_ID = mov.ID)
               ORDER BY mov.ID;");

	if (!$genres)
	{
		throw new Exception("Error: getting from db genres sorted by id movies - return false");
	}

	$formatted_genres = [];
	while ($genre = mysqli_fetch_assoc($genres))
	{
		$formatted_genres[$genre['ID']][] = $genre['NAME'];
	}
	return $formatted_genres;
}