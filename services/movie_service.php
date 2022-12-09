<?php

function format_time(int $min): string
{
	return date('H:i', mktime(0, $min)) ?? "0";
}

function format_description(string $description, int $len = 190): string
{
	return (mb_strlen($description, 'utf8') > $len) ? mb_substr($description, 0, $len, 'utf8') . "..." : $description;
}

function format_movies_adding_actors_and_genres(mysqli_result $movies, array $movies_ids = null): array
{
	$actors = $genres = [];

	if ($movies_ids === null)
	{
		$actors = get_actors_sorted_by_movies_id();
		$genres = get_genres_sorted_by_id_movies();
	}
	elseif ($movies_ids)
	{
		$actors = get_actors_by_movies_ids($movies_ids);
		$genres = get_genres_by_movies_ids($movies_ids);
	}

	$formatted_movies = [];

	while ($movie = mysqli_fetch_assoc($movies))
	{
		$movie['ACTORS'] = $actors[$movie['ID']];
		$movie['GENRES'] = $genres[$movie['ID']];
		$formatted_movies[$movie['ID']] = $movie;
	}
	return $formatted_movies;
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
	$movie = format_movies_adding_actors_and_genres($movie, [$id]);
	return $movie[$id];
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

function get_movies_by_genre_code(string $genre): array
{
	$genre_id = get_genre_id_by_code(sql_protect_str($genre));

	$connection = get_db_connection();

	$movies_of_genre = mysqli_query($connection,
		"SELECT m.*, d.NAME as DIRECTOR_NAME FROM movie m
               INNER JOIN movie_genre mg ON mg.GENRE_ID = $genre_id AND m.ID = mg.MOVIE_ID
               INNER JOIN director d on m.DIRECTOR_ID = d.ID");

	$movies_ids = mysqli_query($connection,
		"SELECT MOVIE_ID FROM movie_genre WHERE GENRE_ID = {$genre_id} LIMIT 50");
	if (!$movies_of_genre || !$movies_ids)
	{
		throw new Exception("Error: getting from db movies by this genre code {$genre} - return false");
	}

	$movies_ids = array_map(fn ($movie): int => $movie[0], mysqli_fetch_all($movies_ids));

	return format_movies_adding_actors_and_genres($movies_of_genre, $movies_ids);
}

function get_movies_like_title(string $title): array
{
	$title = sql_protect_str($title);

	$connection = get_db_connection();

	$movies = mysqli_query($connection,
		"SELECT * FROM movie WHERE TITLE LIKE '%$title%' OR ORIGINAL_TITLE LIKE '%$title%' LIMIT 50");

	$movies_ids = mysqli_query($connection,
		"SELECT ID FROM movie WHERE TITLE LIKE '%$title%' OR ORIGINAL_TITLE LIKE '%$title%' LIMIT 50");

	if (!$movies || !$movies_ids)
	{
		throw new Exception("Error: getting from db movies like this title {$title} - return false");
	}

	$movies_ids = array_map(fn ($movie): int => $movie[0], mysqli_fetch_all($movies_ids));

	return format_movies_adding_actors_and_genres($movies, $movies_ids);
}