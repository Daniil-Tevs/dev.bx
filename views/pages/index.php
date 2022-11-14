<?php
/**
 * @var string $menu
 * @var array $movies
 */
?>

<div class="content">
	<?php foreach ($movies as $movie): ?>
		<?= view('components/movie_card', $movie) ?>
	<?php endforeach ?>
</div>

