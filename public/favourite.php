<?php

require_once __DIR__ . '/../boot.php';

if (isset($_GET['genre']))
{
	redirect(sprintf('/genre=%s', $_GET['genre']));
}

echo view('layout', [
	'title' => option('APP_NAME'),
	'menu' => get_base_menu(),
	'content' => view('/pages/favourite', []),
]);
