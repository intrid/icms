<?php

use yii\widgets\LinkPager;

$this->title = "Отзывы об оптики и офтальмологиии | Умная оптика";

$this->registerMetaTag(['name' => 'description', 'content' => 'Отзывы наших клиентов об оптики и офтальмологии Уманая оптика в Воронеже']);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'отзывы, оптика, фтальмология, отзывы о специалистах']);

?>

<div class="reviews-page">
	<h1>Отзывы</h1>

	<div class="content reviews-page__content">
		<?php if (!empty($reviews)) : ?>
			<?php foreach ($reviews as $review) : ?>
				<blockquote class="review reviews-page__item">
					<cite class="review__author"><?= $review->name ?></cite>
					<time class="review__date"><?= date('d.m.Y', $review->created_at) ?></time>
					<p class="review__text">
						<?= $review->text ?>
					</p>
					<a href="<?= !empty($review->link) ? $review->link : "#" ?>" class="reviews-slider__link" aria-label="Перейти к отзыву"></a>
				</blockquote>
			<?php endforeach; ?>
		<?php endif; ?>

	</div>


	<?= LinkPager::widget([
		'pagination' => $pages,
	]); ?>

</div>

<article class="feedback">
	<div class="feedback__content">
		<p class="feedback__title">Запишитесь на консультацию к специалисту</p>
		<form action="/submit/order" method="get" class="form feedback__form">
			<fieldset class="form__wrapper">
				<legend class="form__legend visually-hidden">Записаться на прием</legend>
				<input class="input form__item" placeholder="Имя" aria-label="Имя" name="name" required>
				<input type="tel" class="input form__item" placeholder="Телефон" aria-label="Телефон" name="phone" required>
				<input class="input-date form__item" placeholder="дд.мм.гггг" aria-label="Дата приема" name="date">
				<p class="form__attention">
					Нажимая кнопку “Записаться”<br>
					Вы даете свое согласие на <a href="/polytic" target="_blank">обработку персональных данных.</a>
				</p>
				<button type="submit" class="button button--main form__open" role="switch">Записаться</button>
			</fieldset>
		</form>
	</div>
</article>

<div id="map" class="map">
	<script class="ymap-lazy" async data-src="<?= Yii::$app->settings->get('Settings.map_city_one') ?>"></script>
</div>