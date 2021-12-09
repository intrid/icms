<?php

$this->title = "Наши специалисты";

$this->registerMetaTag(['name' => 'description', 'content' => 'Наши специалисты']);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'наши специалисты, оптика']);


?>

<section class="experts">
	<div class="content experts__content">
		<h1 class="experts__title">Наши специалисты</h1>

		<?php if (!empty($specialists)) : ?>
			<?php foreach ($specialists as $specialist) : ?>

				<article class="expert experts__item">
					<img alt="<?= $specialist->name ?>" class="expert__photo" src="<?= $specialist->getImage()->getPath('x341') ?>" />
					<h3 class="expert__name"><?= $specialist->name ?></h3>

					<p class="expert__qualify"><?= $specialist->position ?></p>

					<p class="expert__year">Врачебный стаж <span class="blue"><?= $specialist->work_date ?></span></p>

					<ul class="expert__list education">
						<?= $specialist->description ?>
					</ul>
				</article>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</section>

<article class="feedback">
	<div class="feedback__content">
		<p class="feedback__title">Запишитесь на консультацию к специалисту</p>
		<p class="feedback__subtitle">Оставьте заявку, и наши специалисты свяжутся с вами в ближайшее время</p>
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