<?php

function get_db_connection()
{
	static $connection = null;

	if($connection === null)
	{
		$connection = mysqli_init();
		$host = option('DB_HOST');
		$username = option('DB_USERNAME');
		$password = option('DB_PASSWORD');
		$db_name = option('DB_NAME');

		$connection_result = mysqli_real_connect(
			$connection,
			$host,
			$username,
			$password,
			$db_name
		);

		if (!$connection_result)
		{
			$error = mysqli_connect_errno() . ':' . mysqli_connect_error();
			throw new Exception($error);
		}

		$encoding_result = mysqli_set_charset($connection, 'utf8');
		if (!$encoding_result)
		{
			throw new Exception(mysqli_error($connection));
		}
	}

	return $connection;
}

function sql_protect_str(string $data):string
{
	$connection = get_db_connection();
	return mysqli_real_escape_string($connection,$data);
}