<?php
/**
 * @var int $id
 * @var int $rating
 * @var int $age_restriction
 * @var int $duration
 * @var string $title
 * @var string $original_title
 * @var string $release_date
 * @var string $director
 * @var string $description
 * @var array $genres
 * @var array $cast
 */
?>
<div class="base-section">
	<img src="/data/images/<?= $id ?>.jpg" alt="poster">
	<div class="description-section">
		<div class="rating">
			<?php
			for ($i = 1; $i <= 10; $i++): ?>
				<div class="square <?= ($i <= floor($rating)) ? 'active-square' : '' ?>"></div>
			<?php
			endfor; ?>
			<div class="result"><?= $rating ?></div>
		</div>
		<div class="base-info">
			<h2>О фильме</h2>
			<div class="year">
				<h3>Год производства:</h3>
				<p><?= $release_date ?></p>
			</div>
			<div class="directors">
				<h3>Режиссер:</h3>
				<p><?= $director ?></p>
			</div>
			<div class="actors">
				<h3>В главных ролях:</h3>
				<p><?= implode(", ", $cast) ?></p>
			</div>
		</div>
		<div class="full-description">
			<h2>О фильме</h2>
			<p><?= $description ?></p>
		</div>
	</div>
</div>