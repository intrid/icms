<?php if (!empty($slides)) : ?>
	<div class="main-slider main__slider">
		<div class="swiper">
			<div class="swiper-wrapper">

				<?php foreach ($slides as $slide) : ?>
					<div class="swiper-slide">
						<picture class="main-slider__img">
							<source srcset="<?= $slide->getImage()->getPath('1276x457') ?>" media="(min-width: 1000px)">
							<source srcset="<?= $slide->getImage()->getPath('779x289') ?>" media="(min-width: 768px)">
							<img src="<?= $slide->getImage()->getPath('1276x457') ?>" alt="<?= $slide->name ?>">
						</picture>
					</div>
				<?php endforeach; ?>

			</div>
		</div>

		<div class="slider-controls">
			<div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div>
		</div>
		
	</div>
<?php endif; ?>