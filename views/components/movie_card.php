<?php
/**
 * @var int $ID
 * @var int $DURATION
 * @var string $TITLE
 * @var string $RELEASE_DATE
 * @var string $ORIGINAL_TITLE
 * @var string $DESCRIPTION
 */
?>
<div class="movie-item">
	<div class="movie-item-overlay">
		<a href="<?= "/movie_info.php?id=$ID" ?>">Подробнее</a>
	</div>
	<div class="movie-img" style="background-image: url('<?= "/data/images/$ID.jpg" ?>')"></div>
	<div class="movie-info">
		<h1><?= sprintf('%s(%s)', $TITLE, $RELEASE_DATE) ?></h1>
		<h2><?= $ORIGINAL_TITLE ?></h2>
		<div class="movie-description">
			<?= format_description($DESCRIPTION) ?>
		</div>
		<div class="movie-additional-info">
			<div class="movie-time">
				<img src='/data/icons/clock.png' alt="Time:">
				<p><?= sprintf('%s мин. / %s', $DURATION, format_time($DURATION)) ?></p>
			</div>
			<div class="movie-genre">
				<?= implode(', ', array_slice(get_genres_of_movie_id($ID), 0, 3)) ?>
			</div>
		</div>
	</div>

</div>