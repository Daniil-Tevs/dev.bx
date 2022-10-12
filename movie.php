<?php
declare(strict_types=1);

/** @var array $movies */
include "./movie/data.php";

function printMessage(string $message):void
{
	echo $message . "\n";
}

$age = readline("Enter your age:");

if( !is_numeric($age))
	printMessage("Invalid input: entered not a number");
else
{
	$age = (int) $age;
	if($age <0 || $age > 120)
		printMessage("Invalid input: age must be between 0 and 120");
	else
	{
		printMessage('List of movies for your age:');
		$index = 1;
		foreach($movies as $movie)
		{
			if($age>=$movie["age_restriction"])
			{
				printMessage("{$index}. {$movie["title"]} ({$movie["release_year"]}), {$movie["duration"]} minutes, {$movie["age_restriction"]}+, Rating - {$movie["rating"]}");
				$index++;
			}
		}
	}
}





