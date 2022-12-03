<?php
/**
 * @var array $movie
 */
?>
<div class="content full_details">
	<?php
	if (!empty($movie)): ?>
		<div class="movie-details">
			<div class="ru-title">
				<h1><?= sprintf('%s(%s)', $movie['TITLE'], $movie['RELEASE_DATE']) ?></h1>
				<img src="data/icons/heart.png" alt="Heart">
			</div>
			<div class="en-title">
				<h2><?= $movie['ORIGINAL_TITLE'] ?></h2>
				<div class="min-age"><?= $movie['AGE_RESTRICTION'] ?>&plus;</div>
			</div>
			<?= view('components/description_part_of_movie', ['movie' => $movie]) ?>
		</div>
	<?php else: ?>
		<div class="alert alert-find">This movie is don't find</div>
	<?php endif ?>
</div>
