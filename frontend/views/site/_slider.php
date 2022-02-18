<div class="banner main__banner swiper">
	<div class="swiper-wrapper">
		<?php if (!empty($slides)) : ?>
			<?php $i = 0; ?>
			<?php foreach ($slides as $slide) : ?>
				<div class="swiper-slide open-banner">
					<div class="open-banner__wrapper <?= ($i == 0) ? "" : "other-slides" ?>">
						<?= $slide->name ?>
					</div>
					<picture class="open-banner__img">
						<source srcset="<?= $slide->getImageByName('slider_desktop')->getPathToOrigin(); ?>" media="(min-width: 1280px)">
						<source srcset="<?= $slide->getImageByName('slider_tablet')->getPathToOrigin(); ?>" media="(min-width: 768px)">
						<img src="<?= $slide->getImageByName('slider_mobile')->getPathToOrigin(); ?>" alt="Умная оптика">
					</picture>
				</div>
				<?php $i++; ?>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<div class="swiper-pagination"></div>
	<button class="swiper-button-prev" aria-label="Назад"></button>
	<button class="swiper-button-next" aria-label="Вперед"></button>
</div>