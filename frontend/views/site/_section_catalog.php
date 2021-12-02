<section class="catalog">
	<h2 class="visually-hidden">Каталог</h2>

	<?php if (!empty($goods)) : ?>
		<?php foreach ($goods as $good) : ?>
			<?= $this->render('../common/_good_small_card', compact('good')); ?>
		<?php endforeach; ?>
	<?php endif; ?>

</section>