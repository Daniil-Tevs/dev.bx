<?php

function format_time(int $min): string
{
	return date('H:i', mktime(0, $min));
}

function format_description(string $description, int $len = 310): string
{
	return (strlen($description) > $len) ? substr($description, 0, 320) . "..." : $description;
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

function get_movies_by_title_of_genre(string $genre, array $movies): array
{
	$movies_of_genre = [];
	foreach ($movies as $movie)
	{
		if (in_array($genre, $movie['genres'], true))
		{
			$movies_of_genre[] = $movie;
		}
	}
	return $movies_of_genre;
}

function get_movie_id_by_title(string $title, array $movies): int{
	foreach ($movies as $movie)
	{
		if ($movie['title'] === $title || $movie['original_title'] === $title)
		{
			return $movie['id'];
		}
	}
	return -1;
}