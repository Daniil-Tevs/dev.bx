<?php
declare(strict_types=1);

/** @var array $movies */
/** @var string $title */
include "./movie/data.php";
include "functions.php";
include "./movie/functions.php";

$age = readline("Enter your age:");

checkRightEnteredAge($age);
printMessage($title);
printAvailableMovies((int)$age,$movies);






