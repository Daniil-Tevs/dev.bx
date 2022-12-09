<?php

function get_actors_by_movies_ids(array $movies_ids): array
{
	$connection = get_db_connection();
	$query = sprintf("SELECT ma.MOVIE_ID,a.NAME FROM movie_actor ma
							INNER JOIN actor a ON ma.ACTOR_ID = a.ID AND ma.MOVIE_ID IN (%s)
							ORDER BY ma.MOVIE_ID", implode(',', $movies_ids));
	$actors = mysqli_query($connection, $query);
	if (!$actors)
	{
		throw new Exception("Error: getting from db actors by movies ids- return false");
	}
	$actors_sorted_by_movies_ids = [];
	while ($actor = mysqli_fetch_assoc($actors))
	{
		$actors_sorted_by_movies_ids[$actor['MOVIE_ID']][] = $actor['NAME'];
	}
	return $actors_sorted_by_movies_ids;
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

