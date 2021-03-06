<?php

use common\models\Reviews;

$reviews = Reviews::find(['visibility' => 1, 'is_delete' => 0])->orderBy('created_at DESC')->all();

?>

<section class="reviews">
	<div class="content reviews__content">
		<h3 class="reviews__title">Отзывы</h3>
		<div class="reviews__link-block link-block"><span class="link-block__num"><?= Yii::$app->settings->get('Settings.yandex_score') ?></span>
			<p class="link-block__title">Отзывы в Яндексе</p>
			<a class="link-block__link" rel="noreferrer noopener" target="_blank" href="<?= Yii::$app->settings->get('Settings.yandex_link') ?>">перейти к отзывам</a>
		</div>
		<div class="reviews__slider">
			<div class="reviews-slider">
				<div class="swiper-wrapper">

					<?php if (!empty($reviews)) : ?>
						<?php foreach ($reviews as $review) : ?>
							<blockquote class="reviews-slider__item review swiper-slide">
								<cite class="review__author"><?= $review->name?></cite>
								<time class="review__date"><?= date('d.m.Y', $review->created_at) ?></time>
								<p class="review__text">
									<?= $review->text?>
								</p>
								<a href="<?= !empty($review->link) ? $review->link : "#"?>" class="review__link" aria-label="Перейти к отзыву"></a>
							</blockquote>
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