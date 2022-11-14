<?php
/**
 * @var array $menu
 */
?>
<nav>
	<div class="icon">
		<a href='/'><img src="data/icons/logo.png" alt="none"></a>
	</div>
	<div class="menu">
		<?php foreach ($menu as $url => $title): ?>
			<div class="menu-item"><a href="<?= $url ?>"><?= $title ?></a></div>
		<?php endforeach ?>
	</div>
</nav>
