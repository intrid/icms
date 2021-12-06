<section class="services">
	<h2 class="visually-hidden">Наши услуги</h2>
	<article class="services__item services__item--doc">
		<h3 class="services__title">Медицинские<br>услуги</h3>
		<a class="button button--second services__link" href="/">Подбор<br>очков </a>
		<a class="button button--main services__link" href="/">Подбор<br>контактных линз</a>
	</article>
	<article class="services__item services__item--lens">
		<h3 class="services__title">Изготовление<br>и ремонт очков</h3>
		<a class="button button--second services__link" href="/">Производство<br>очков </a>
		<a class="button button--main services__link" href="/">Ремонт<br>очков</a>
	</article>
	<section class="advantages">
		<?= Yii::$app->settings->get('Settings.advantages') ?>
	</section>
</section>