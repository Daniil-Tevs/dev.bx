<?php
function checkRightEnteredAge($age):void
{
	if(!is_numeric($age))
	{
		exit("Invalid input: entered not a number");
	}
	if((int)$age<0 || (int)$age>120)
	{
		exit("Invalid input: age must be between 0 and 120");
	}
}
function printAvailableMovies(int $age,array $movies):void
{
	$index = 1;
	foreach($movies as $movie)
	{
		if($age>=$movie["age_restriction"])
		{
			printMessage("{$index}. ".formatMovie($movie));
			$index++;
		}
	}
}
function formatMovie(array $movie):string
{
	return "{$movie["title"]} ({$movie["release_year"]}), {$movie["age_restriction"]}+, Rating - {$movie["rating"]}";
}