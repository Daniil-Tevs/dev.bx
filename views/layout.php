<?php
/**
 * @var string $title
 * @var array $menu
 * @var array $content
 */
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?= $title ?></title>
	<link rel="stylesheet" href='reset.css'>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
	<div class="sidebar">
		<?= view('components/menu', ['menu' => $menu]) ?>
	</div>
	<div class="wrapper">
		<div class="header">
			<form action="/" method="post">
				<input type="text" name="title" placeholder="Поиск по каталогу..." class="input-search">
				<button type="submit" class="button-search">ИСКАТЬ</button>
			</form>
			<button type="submit" class="add-movie">ДОБАВИТЬ ФИЛЬМ</button>
		</div>
		<?= $content ?>
	</div>
</div>
</body>
</html>