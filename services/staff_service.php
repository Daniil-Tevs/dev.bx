<?php

function get_actors_by_movie_id(int $id): array
{
	$connection = get_db_connection();
	$actors = mysqli_query($connection,
		"SELECT a.NAME FROM movie mov
               INNER JOIN actor a ON a.ID in (SELECT ACTOR_ID FROM movie_actor WHERE mov.ID = MOVIE_ID)
               WHERE mov.ID = $id");
	if (!$actors)
	{
		throw new Exception("Error: getting from db actors by this movie id $id - return false");
	}
	$actors = mysqli_fetch_all($actors);
	return array_map(fn ($actor): string => $actor[0], $actors);
}

function get_actors_sorted_by_movies_id(): array
{
	$connection = get_db_connection();
	$actors = mysqli_query($connection,
		"SELECT mov.ID, a.NAME FROM movie mov
               INNER JOIN actor a ON a.ID in (SELECT ACTOR_ID FROM movie_actor WHERE mov.ID = MOVIE_ID)
               ORDER BY mov.ID;");
	if (!$actors)
	{
		throw new Exception("Error: getting from db actors sorted by movies id - return false");
	}
	$formatted_actors = [];
	while ($actor = mysqli_fetch_assoc($actors))
	{
		$formatted_actors[$actor['ID']][] = $actor['NAME'];
	}
	return $formatted_actors;
}

