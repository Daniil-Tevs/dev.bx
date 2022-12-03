<?php
/**
 * @var array $movie
 */
?>
<div class="base-section">
	<img src="/data/images/<?= $movie['ID'] ?>.jpg" alt="poster">
	<div class="description-section">
		<div class="rating">
			<?php for ($i = 1; $i <= 10; $i++): ?>
				<div class="square <?= ($i <= floor((int)$movie['RATING'])) ? 'active-square' : '' ?>"></div>
			<?php endfor; ?>
			<div class="result"><?= $movie['RATING'] ?></div>
		</div>
		<div class="base-info">
			<h2>О фильме</h2>
			<div class="year">
				<h3>Год производства:</h3>
				<p><?= $movie['RELEASE_DATE'] ?></p>
			</div>
			<div class="directors">
				<h3>Режиссер:</h3>
				<p><?= $movie['DIRECTOR_NAME'] ?></p>
			</div>
			<div class="actors">
				<h3>В главных ролях:</h3>
				<p><?= implode(", ", $movie['ACTORS']) ?></p>
			</div>
		</div>
		<div class="full-description">
			<h2>О фильме</h2>
			<p><?= $movie['DESCRIPTION'] ?></p>
		</div>
	</div>
</div>