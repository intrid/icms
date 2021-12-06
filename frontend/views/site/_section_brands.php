<?php

use common\models\Brands;

$brands = Brands::find(['visibility' => 1])->all();

?>
<section class="brands">
	<div class="content brands__content">
		<h3>Представленные бренды</h3>
		<div class="brands__slider">
			<div class="brands-slider swiper">
				<div class="swiper-wrapper brands-slider__wrapper">
					<?php if (!empty($brands)) : ?>
						<?php foreach ($brands as $brand) : ?>
							<div class="swiper-slide"><img src="<?= $brand->getImage()->getPath('109x') ?>" alt="<?= $brand->name?>"></div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="swiper-controls">
				<div class="swiper-pagination"></div>
				<button class="swiper-button-prev"></button>
				<button class="swiper-button-next"></button>
			</div>
		</div>
	</div>
</section>