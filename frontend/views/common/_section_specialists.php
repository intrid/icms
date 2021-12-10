<?php

use common\models\Specialists;

$specialists = Specialists::find(['visibility' => 1])->all();

?>

<section class="experts">
	<div class="content experts__content">
		<h2 class="experts__title">Наши специалисты</h2>

		<?php if (!empty($specialists)) : ?>
			<?php foreach ($specialists as $specialist) : ?>

				<article class="expert experts__item">
					<img alt="<?= $specialist->name ?>" class="expert__photo" src="<?= $specialist->getImage()->getPath('x341') ?>" />
					<h3 class="expert__name"><?= $specialist->name ?></h3>

					<p class="expert__qualify"><?= $specialist->position ?></p>

					<p class="expert__year">Врачебный стаж <span class="blue"><?= $specialist->work_date ?></span></p>
						<?= $specialist->description ?>
				</article>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</section>