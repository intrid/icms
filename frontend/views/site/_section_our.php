<?php

use common\models\Gallery;

$photos = Gallery::find(['visibility' => 1])->orderBy('id DESC')->limit(10)->all();

?>

<section class="our">
	<h2>Салон оптики в Воронеже</h2>
	<div class="our__slider">
		<div class="swiper our-slider">
			<div class="swiper-wrapper">
				<?php if (!empty($photos)) : ?>
					<?php foreach ($photos as $photo) : ?>
						<div data-src="<?= $photo->getImage()->getPathToOrigin() ?>" class="swiper-slide our-slider__slide" data-fancybox>
							<img src="<?= $photo->getImage()->getPath('470x') ?>" alt="<?= $photo->name ?>">
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="swiper-controls">
			<div class="swiper-pagination"></div>
			<button class="swiper-button-prev" aria-label="Назад"></button>
			<button class="swiper-button-next" aria-label="Вперед"></button>
		</div>
	</div>
</section>