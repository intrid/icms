<header class="header">
	<div class="header__top">
		<a href="/" class="logo" title="На главную" aria-label="На главную страницу">
			<img src="/img/logo.png" alt="Умная оптика">
		</a>
		<a href="#map" class="address header__address" title="Посмотреть на карте">
			<p class="address__cord">
				<?= Yii::$app->settings->get('Settings.address_place') ?>
			</p>
			<p class="address__item">
				<span class="address__week">Пн-Пт</span> с <time>10:00</time> до <time>19:00</time>
			</p>
			<p class="address__item">
				<span class="address__week">Сб</span> с <time>10:00</time> до <time>16:00</time>
			</p>
		</a>
		<a href="tel:<?= Yii::$app->settings->get('Settings.phone_one') ?>" class="phone header__phone">
			<span class="phone__number header__number"><?= Yii::$app->settings->get('Settings.phone_one') ?></span>
		</a>
		<div class="header__form"></div>
		<div class="header__buttons">
			<button class="burger header__open" aria-label="Кнопка меню"><span></span><span></span><span></span></button>
			<button class="cross cross--green header__close" aria-label="Кнопка закрыть"></button>
		</div>
	</div>
</header>