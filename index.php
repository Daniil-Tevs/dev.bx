<?php
function sum(...$numbers)
{
	$sum = 0;
	foreach($numbers as $number)
		$sum+=$number;
	return $sum;
}

echo sum(1,2,3,4,5,6,7,8,9,10);
