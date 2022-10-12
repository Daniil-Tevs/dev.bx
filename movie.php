<?php

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
}





