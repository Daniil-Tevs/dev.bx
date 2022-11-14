<?php

function format_time(int $min):string
{
	return date('H:i',mktime(0,$min));
}

function format_description(string $description, int $len = 310):string{
	return (strlen($description)>$len)? substr($description,0,320)."...": $description;
}
