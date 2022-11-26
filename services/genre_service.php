<?php

function get_title_of_genre(string $url, array $genres):string
{
	return $genres[(string)$url];
}
