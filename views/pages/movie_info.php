<?php
/**
 * @var array $movies
 */
?>
<div class="content full_details">
	<?php if ($movies['id'] !== null): ?>
		<div class="movie-details">
			<div class="ru-title">
				<h1><?= sprintf('%s(%s)', $movies['title'], $movies['release_date']) ?></h1>
				<img src="data/icons/heart.png" alt="Heart">
			</div>
			<div class="en-title">
				<h2><?= $movies['original_title'] ?></h2>
				<div class="min-age"><?= $movies['age_restriction'] ?>&plus;</div>
			</div>
			<?= view('components/description_part_of_movie', $movies) ?>
		</div>
	<?php else: ?>
		<div class="alert-find">This movie is don't find</div>
	<?php endif ?>
</div>
