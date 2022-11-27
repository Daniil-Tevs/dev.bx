<?php
/**
 * @var int $ID
 * @var int $RATING
 * @var int $AGE_RESTRICTION
 * @var int $DURATION
 * @var string $TITLE
 * @var string $ORIGINAL_TITLE
 * @var string $RELEASE_DATE
 * @var int $DIRECTOR_ID
 * @var string $DESCRIPTION
 * @var array $CAST
 */
?>
<div class="base-section">
	<img src="/data/images/<?= $ID ?>.jpg" alt="poster">
	<div class="description-section">
		<div class="rating">
			<?php for ($i = 1; $i <= 10; $i++): ?>
				<div class="square <?= ($i <= floor($RATING)) ? 'active-square' : '' ?>"></div>
			<?php endfor; ?>
			<div class="result"><?= $RATING ?></div>
		</div>
		<div class="base-info">
			<h2>О фильме</h2>
			<div class="year">
				<h3>Год производства:</h3>
				<p><?= $RELEASE_DATE ?></p>
			</div>
			<div class="directors">
				<h3>Режиссер:</h3>
				<p><?= get_director_name_by_id($DIRECTOR_ID) ?></p>
			</div>
			<div class="actors">
				<h3>В главных ролях:</h3>
				<p><?= implode(", ", get_actors_names_by_movie_id($ID)) ?></p>
			</div>
		</div>
		<div class="full-description">
			<h2>О фильме</h2>
			<p><?= $DESCRIPTION ?></p>
		</div>
	</div>
</div>