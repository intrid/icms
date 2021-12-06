<?php

use common\models\Reviews;

$reviews = Reviews::find(['visibility' => 1])->orderBy('created_at DESC')->all();

?>

<section class="reviews">
	<div class="content reviews__content">
		<h3 class="reviews__title">Отзывы</h3>
		<div class="reviews__link-block link-block"><span class="link-block__num"><?= Yii::$app->settings->get('Settings.yandex_score') ?></span>
			<p class="link-block__title">Отзывы в Яндексе</p>
			<a class="link-block__link" target="_blank" href="<?= Yii::$app->settings->get('Settings.yandex_link') ?>">перейти к отзывам</a>
		</div>
		<div class="reviews__slider">
			<div class="reviews-slider">
				<div class="swiper-wrapper">

					<?php if (!empty($reviews)) : ?>
						<?php foreach ($reviews as $review) : ?>
							<blockquote class="reviews-slider__item swiper-slide">
								<cite class="reviews-slider__author"><?= $review->name?></cite>
								<time class="reviews-slider__date"><?= date('d.m.Y', $review->created_at) ?></time>
								<p class="reviews-slider__text">
									<?= $review->text?>
								</p>
								<a href="<?= !empty($review->link) ? $review->link : "#"?>" class="reviews-slider__link" aria-label="Перейти к отзыву"></a>
							</blockquote>
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