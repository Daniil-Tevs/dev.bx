<?php

require_once __DIR__ . '/../boot.php';
/**
 * @var int $description_len
 * @var string $title
 * @var array $base_menu
 */

if (isset($_GET['genre']))
{
	redirect(sprintf('/genre=%s', $_GET['genre']));
}

echo view('layout', [
	'title' => $title,
	'menu' => $base_menu,
	'content' => view('/pages/favourite', []),
]);
