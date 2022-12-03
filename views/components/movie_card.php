<?php
/**
 * @var array $movie
 */
?>
<div class="movie-item">
	<div class="movie-item-overlay">
		<a href="<?= "/movie_info.php?id={$movie['ID']}" ?>">Подробнее</a>
	</div>
	<div class="movie-img" style="background-image: url('<?= "/data/images/{$movie['ID']}.jpg" ?>')"></div>
	<div class="movie-info">
		<h1><?= sprintf('%s(%s)', $movie['TITLE'], $movie['RELEASE_DATE']) ?></h1>
		<h2><?= $movie['ORIGINAL_TITLE'] ?></h2>
		<div class="movie-description">
			<?= format_description($movie['DESCRIPTION']) ?>
		</div>
		<div class="movie-additional-info">
			<div class="movie-time">
				<img src='/data/icons/clock.png' alt="Time:">
				<p><?= sprintf('%s мин. / %s', $movie['DURATION'], format_time($movie['DURATION'])) ?></p>
			</div>
			<div class="movie-genre">
				<?= implode(', ', array_slice($movie['GENRES'], 0, 3)) ?>
			</div>
		</div>
	</div>

</div>