<?php

function get_director_name_by_id(int $id): string
{
	$connection = get_db_connection();
	$director = mysqli_query($connection, "SELECT * FROM director WHERE ID = '$id'");
	$director = mysqli_fetch_assoc($director);
	return ($director['NAME']) ?: '';
}

function get_actors_names_by_movie_id(int $movie_id): array
{
	$connection = get_db_connection();
	$inner_query = sprintf("SELECT ACTOR_ID FROM movie_actor WHERE MOVIE_ID = %s", sql_protect_str($movie_id));
	$actors = mysqli_query($connection, "SELECT NAME FROM actor WHERE ID IN ($inner_query)");
	$actors = mysqli_fetch_all($actors);
	return ($actors) ? array_map(fn ($actor): string => $actor[0], $actors) : [];
}