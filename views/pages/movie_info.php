<?php
/**
 * @var array $movies
 */
?>
<div class="content full_details">
	<?php
	if (!empty($movies)): ?>
		<div class="movie-details">
			<div class="ru-title">
				<h1><?= sprintf('%s(%s)', $movies['TITLE'], $movies['RELEASE_DATE']) ?></h1>
				<img src="data/icons/heart.png" alt="Heart">
			</div>
			<div class="en-title">
				<h2><?= $movies['ORIGINAL_TITLE'] ?></h2>
				<div class="min-age"><?= $movies['AGE_RESTRICTION'] ?>&plus;</div>
			</div>
			<?= view('components/description_part_of_movie', $movies) ?>
		</div>
	<?php
	else: ?>
		<div class="alert alert-find">This movie is don't find</div>
	<?php
	endif ?>
</div>
