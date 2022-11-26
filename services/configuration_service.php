<?php

function option(string $name, $default_value = null)
{
	/** @var array $config */
	static $config = null;

	if ($config === null)
	{
		$config = require ROOT . '/config.php';
	}

	if (array_key_exists($name, $config))
	{
		return $config[$name];
	}

	if ($default_value !== null)
	{
		return $default_value;
	}
	throw new Exception("Configuration option {$name} not found");
}