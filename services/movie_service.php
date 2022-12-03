<?php

function format_time(int $min): string
{
	return date('H:i', mktime(0, $min)) ?? "0";
}

function format_description(string $description, int $len = 190): string
{
	return (mb_strlen($description, 'utf8') > $len) ? mb_substr($description, 0, $len, 'utf8') . "..." : $description;
}

function get_movie_by_id(int $id): array
{
	$connection = get_db_connection();
	$movie = mysqli_query($connection,
		"SELECT mov.*, d.NAME as DIRECTOR_NAME FROM movie mov
               INNER JOIN director d ON d.ID = mov.DIRECTOR_ID
               WHERE mov.ID = $id
               LIMIT 1;");
	if (!$movie)
	{
		throw new Exception("Error: getting movie from db by this id {$id} - return false");
	}
	$movie = mysqli_fetch_array($movie);
	if ($movie === null)
	{
		return [];
	}
	$movie['GENRES'] = get_genres_by_movie_id($movie['ID']);
	$movie['ACTORS'] = get_actors_by_movie_id($movie['ID']);
	return $movie;
}

function format_movies_adding_actors_and_genres($movies): array
{
	$genres = get_genres_sorted_by_id_movies();
	$actors = get_actors_sorted_by_movies_id();

	$formatted_movies = [];

	while ($movie = mysqli_fetch_assoc($movies))
	{
		$movie['GENRES'] = $genres[$movie['ID']];
		$movie['ACTORS'] = $actors[$movie['ID']];
		$formatted_movies[$movie['ID']] = $movie;
	}
	return $formatted_movies;
}

function get_movies_by_genre_code(string $genre): array
{
	$genre_id = get_genre_id_by_code(sql_protect_str($genre));

	$connection = get_db_connection();

	$movies_of_genre = mysqli_query($connection,
		"SELECT m.*, d.NAME as DIRECTOR_NAME FROM movie m
               INNER JOIN movie_genre mg ON mg.GENRE_ID = $genre_id AND m.ID = mg.MOVIE_ID
               INNER JOIN director d on m.DIRECTOR_ID = d.ID");
	if (!$movies_of_genre)
	{
		throw new Exception("Error: getting from db movies by this genre code {$genre} - return false");
	}
	return format_movies_adding_actors_and_genres($movies_of_genre);
}

function get_movies_like_title(string $title): array
{
	$title = sql_protect_str($title);
	$connection = get_db_connection();
	$movies = mysqli_query($connection,
		"SELECT mov.*, d.NAME as DIRECTOR_NAME FROM movie mov
               INNER JOIN director d ON d.ID = mov.DIRECTOR_ID
               WHERE TITLE LIKE '%$title%' OR ORIGINAL_TITLE LIKE '%$title%'");
	if (!$movies)
	{
		throw new Exception("Error: getting from db movies like this title {$title} - return false");
	}
	$formatted_movies = [];
	while ($movie = mysqli_fetch_assoc($movies))
	{
		$movie['GENRES'] = get_genres_by_movie_id($movie['ID']);
		$movie['ACTORS'] = get_actors_by_movie_id($movie['ID']);
		$formatted_movies[$movie['ID']] = $movie;
	}
	return $formatted_movies;
}

function get_movies_with_full_info(): array
{
	$connection = get_db_connection();
	$movies = mysqli_query($connection,
		"SELECT mov.*, d.NAME as DIRECTOR_NAME FROM movie mov
               INNER JOIN director d ON d.ID = mov.DIRECTOR_ID
               ORDER BY mov.ID
               LIMIT 50");
	if (!$movies)
	{
		throw new Exception("Error: getting from db all movies - return false");
	}
	return format_movies_adding_actors_and_genres($movies);
}