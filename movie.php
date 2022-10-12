<?php
declare(strict_types=1);

/** @var array $movies */
/** @var string $title */
include "./movie/data.php";
include "function.php";

function checkRightEnteredAge($age):void
{
	if( !is_numeric($age))
		exit("Invalid input: entered not a number");
	if((int)$age <0 || (int)$age > 120)
		exit("Invalid input: age must be between 0 and 120");

}
function formatMovie(array $movie):string
{
	return "{$movie["title"]} ({$movie["release_year"]}), {$movie["duration"]} minutes, {$movie["age_restriction"]}+, Rating - {$movie["rating"]}";
}

function printAvailableMovies(int $age,array $movies):void
{
	$index = 1;
	foreach($movies as $movie)
	{
		if($age>=$movie["age_restriction"])
		{

			printMessage("{$index}." . formatMovie($movie));
			$index++;
		}
	}
}

$age = readline("Enter your age:");

checkRightEnteredAge($age);
printMessage($title);
printAvailableMovies((int)$age,$movies);






