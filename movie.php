<?php
/** @var array $movies */
include "./movie/data.php";

$age = readline("Enter your age:");

if( !is_numeric($age))
{
	echo "Invalid input: entered not a number";
}
else
{
	$age = (int) $age;
	if($age <0 || $age > 120)
	{
		echo "Invalid input: age must be between 0 and 100";

	}
	else
	{
		echo 'List of movies for your age:' . "\n";
		$index = 1;
		foreach($movies as $movie)
		{
			if($age>=$movie["age_restriction"])
			{
				echo "{$index}. {$movie["title"]} ({$movie["release_year"]}), {$movie["duration"]} minutes, {$movie["age_restriction"]}+, Rating - {$movie["rating"]}"
					. "\n";
				$index++;
			}
		}
	}

}





