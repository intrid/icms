<?php

use common\models\Brands;

$brands = Brands::find(['visibility' => 1])->orderBy('id DESC')->all();

if (!empty($brands)){
	while(count($brands) <= 7){
		$brands = array_merge($brands, $brands);
	}
}

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
				<button class="swiper-button-prev" aria-label="Назад"></button>
				<button class="swiper-button-next" aria-label="Вперед"></button>
			</div>
		</div>
	</div>
</section>