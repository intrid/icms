<?php

$this->title = "Информация об оптике и офтальмологии | Умная оптика";

$this->registerMetaTag(['name' => 'description', 'content' => 'Умная оптика оказывает квалифицированные медицинские услуги и услуги по изготовлению и ремонту очков. Здесь работают квалифицированные врачи-офтальмологи и оптометристы']);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'об оптике, специалисты, оптика, умная оптика, лицензии']);

?>

<section class="licensies">
	<div class="content">
		<h1>Об оптике</h1>
		<p>
			ООО «ОПТИЧЕСКИЕ ТОВАРЫ» выступает под брендом "Умная оптика". Квалифицированные врачи-офтальмологи и оптометристы оказывают медицинские услуги по подбору очков и контактных линз. Также специалисты оптики изготовят очки и при необходимости отремонтируют их.
		</p>
	</div>
</section>

<section class="licensies">
	<div class="content">
<div class="license" data-fancybox="gallery" data-src="/img/lic/licn1.jpg"><img alt="" src="/img/lic/licns1.jpg" /></div>

<div class="license" data-fancybox="gallery" data-src="/img/lic/licn2.jpg"><img alt="" src="/img/lic/licns2.jpg" /></div>

<div class="license" data-fancybox="gallery" data-src="/img/lic/licn3.jpg"><img alt="" src="/img/lic/licns3.jpg" /></div>

<div class="license" data-fancybox="gallery" data-src="/img/lic/svid1.jpg"><img alt="" src="/img/lic/svids.jpg" /></div>

<div class="license" data-fancybox="gallery" data-src="/img/lic/svid2.jpg"><img alt="" src="/img/lic/svids2.jpg" /></div>

<div class="license" data-fancybox="gallery" data-src="/img/lic/uved.jpg"><img alt="" src="/img/lic/uvedomls.jpg" /></div>

<div class="license" data-fancybox="gallery" data-src="/img/lic/vipis.jpg"><img alt="" src="/img/lic/vipiss1.jpg" /></div>

<div class="license" data-fancybox="gallery" data-src="/img/lic/vipic2.jpg"><img alt="" src="/img/lic/vipiss2.jpg" /></div>
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
						<div data-src="<?= $photo->getImage()->getPathToOrigin() ?>" class="swiper-slide our-slider__slide" data-fancybox="gallery-1">
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