<?php
/**
 * @var int $id
 * @var int $duration
 * @var string $title
 * @var string $release_date
 * @var string $original_title
 * @var string $description
 * @var array $genres
 */
?>
<div class="movie-item">
	<div class="movie-item-overlay">
		<a href="<?= "/movie_info.php?id=$id" ?>">Подробнее</a>
	</div>
	<div class="movie-img" style="background-image: url('<?= "/data/images/$id.jpg" ?>')"></div>
	<div class="movie-info">
		<h1><?= sprintf('%s(%s)', $title, $release_date) ?></h1>
		<h2><?= $original_title ?></h2>
		<div class="movie-description">
			<?= format_description($description) ?>
		</div>
		<div class="movie-additional-info">
			<div class="movie-time">
				<img src='/data/icons/clock.png' alt="Time:">
				<p><?= sprintf('%s мин. / %s', $duration, format_time($duration)) ?></p>
			</div>
			<div class="movie-genre">
				<?= implode(', ', array_slice($genres, 0, 3)) ?>
			</div>
		</div>
	</div>

</div>