<?php

$this->title = "Об оптике";

$this->registerMetaTag(['name' => 'description', 'content' => 'Умная оптика оказывает квалифицированные медицинские услуги и услуги по изготовлению и ремонту очков. Здесь работают квалифицированные врачи-офтальмологи и оптометристы']);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'об оптике, специалисты, оптика, умная оптика']);

?>

<section class="licensies">
	<div class="content">
		<h1>Об оптике</h1>
		<p>
			ООО «ОПТИЧЕСКИЕ ТОВАРЫ» выступает под брендом "Умная оптика" и оказывает квалифицированные медицинские услуги и услуги по изготовлению и ремонту очков.
			В нашей компании работают квалифицированные врачи-офтальмологи и оптометристы.
		</p>
	</div>
</section>

<section class="licensies">
	<div class="content">
		<div class="license" data-fancybox="gallery" data-src="/img/lic001.jpg"><img alt="Документ #1" src="/img/license-1.jpg" /></div>
		<div class="license" data-fancybox="gallery" data-src="/img/lic002.jpg"><img alt="Документ #2" src="/img/license-2.jpg" /></div>
		<div class="license" data-fancybox="gallery" data-src="/img/lic003.jpg"><img alt="Документ #3" src="/img/license-3.jpg" /></div>
		<div class="license" data-fancybox="gallery" data-src="/img/lic004.jpg"><img alt="Документ #4" src="/img/license-4.jpg" /></div>
		<div class="license" data-fancybox="gallery" data-src="/img/lic005.jpg"><img alt="Документ #5" src="/img/license-5.jpg" /></div>
	</div>
</section>

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

					<ul class="expert__list education">
						<?= $specialist->description ?>
					</ul>
				</article>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</section>

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
			<button class="swiper-button-prev"></button>
			<button class="swiper-button-next"></button>
		</div>
	</div>
</section>

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