<?php

function view(string $path, array $variables = []): string
{
	if (!preg_match('/^[0-9A-Za-z\/_-]+$/', $path))
	{
		throw new Exception("Invalid template path");
	}


	$absolute_path = ROOT . "/views/$path.php";

	if (!file_exists($absolute_path))
	{
		throw new Exception('Template not found');
	}
	ob_start();

	extract($variables, EXTR_OVERWRITE);

	require $absolute_path;

	return ob_get_clean();
}

function safe(string $value): string
{
	return htmlspecialchars($value, ENT_QUOTES);
}