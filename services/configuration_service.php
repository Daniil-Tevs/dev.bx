<?php

function option(string $name, $default_value = null)
{
	/** @var array $config */
	static $config = null;

	if ($config === null)
	{
		$master_config = require ROOT . '/config.php';
		if(file_exists(ROOT . '/config_local.php'))
		{
			$local_config = require ROOT . '/config_local.php';
		}
		else
		{
			$local_config = [];
		}

		$config = array_merge($master_config,$local_config);
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