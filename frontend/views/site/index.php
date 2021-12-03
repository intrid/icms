<?php

$this->title = Yii::$app->settings->get('Settings.title');
$this->registerMetaTag(['name' => 'description', 'content' => Yii::$app->settings->get('Settings.description')]);
$this->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->settings->get('Settings.keywords')]);

?>

<div class="banner main__banner swiper">
	<div class="swiper-wrapper">
		<div class="swiper-slide banner__slide open-banner">
			<div class="open-banner__wrapper">
				<p class="open-banner__title">Скидки по промокоду <span class="green">"С открытием!"</span></p>
				<div class="open-banner__content sales">
					<div class="sales__item">
						<p class="sales__title">На медицинские услуги</p>
						<p class="sales__percent">30%</p>
					</div>
					<div class="sales__item">
						<p class="sales__title">На услуги по изготовлению очков</p>
						<p class="sales__percent">20%</p>
					</div>
					<div class="sales__item">
						<p class="sales__title">На услуги по изготовлению оправ</p>
						<p class="sales__percent">20%</p>
					</div>
					<p class="sales__date">До <time>01.01.2022</time> г.</p>
				</div>
			</div>
			<picture class="open-banner__img">
				<source srcset="/img/slide-1-dt.jpg" media="(min-width: 1280px)">
				<source srcset="/img/slide-1-tb.jpg" media="(min-width: 768px)"><img src="/img/slide-1.jpg" alt="Умная оптика">
			</picture>
		</div>
		<div class="swiper-slide open-banner open-banner--topo">
			<picture class="open-banner__img">
				<source srcset="/img/slide-2-dt.jpg" media="(min-width: 1280px)">
				<source srcset="/img/slide-2-tb.jpg" media="(min-width: 768px)"><img src="/img/slide-2-mb.jpg" alt="Корнеотопограф">
			</picture>
			<div class="open-banner__wrapper other-slides">
				<p class="open-banner__caption">Инновационное оборудование</p>
				<p class="open-banner__title">Корнеотопограф<br>medmnt e300</p>
				<p class="open-banner__text">Многофункциональное устройство для здоровья глаз</p>
				<p class="open-banner__slogan">Когда точность имеет значение!</p>
			</div>
		</div>
		<div class="swiper-slide open-banner open-banner--tomo">
			<picture class="open-banner__img">
				<source srcset="/img/slide-3-dt.jpg" media="(min-width: 1280px)">
				<source srcset="/img/slide-3-tb.jpg" media="(min-width: 768px)"><img src="/img/slide-3-mb.jpg" alt="Когерентный томограф">
			</picture>
			<div class="open-banner__wrapper other-slides">
				<p class="open-banner__caption">Инновационное оборудование</p>
				<p class="open-banner__title">когерентный томограф<br>3D OCT 2000</p>
				<p class="open-banner__slogan">Сокращаем время проведения процедуры!</p>
			</div>
		</div>
		<div class="swiper-slide open-banner open-banner--lens">
			<picture class="open-banner__img">
				<source srcset="/img/slide-4-dt.jpg" media="(min-width: 1280px)">
				<source srcset="/img/slide-4-tb.jpg" media="(min-width: 768px)"><img src="/img/slide-4-mb.jpg" alt="Когерентный томограф">
			</picture>
			<div class="open-banner__wrapper other-slides">
				<p class="open-banner__title"><span>Бесплатный</span><br>подбор линз</p>
				<p class="open-banner__text">Для контроля миопии</p>
				<p class="open-banner__slogan">COOPER VISION MISIGHT</p>
			</div>
		</div>
	</div>
	<div class="swiper-pagination"></div><button class="swiper-button-prev"></button> <button class="swiper-button-next"></button>
</div>
<form action="/" class="form form--after-banner">
	<fieldset class="form__wrapper">
		<legend class="form__legend visually-hidden">Записаться на прием</legend><input class="input form__item" placeholder="Имя" aria-label="Имя"> <input type="tel" class="input form__item" placeholder="Телефон" aria-label="Телефон"> <input class="input-date form__item" placeholder="дд.мм.гггг" aria-label="Дата приема">
		<p class="form__attention">Нажимая кнопку “Записаться”<br>Вы даете свое согласие на <a href="/" target="_blank">обработку персональных данных.</a></p><button type="button" class="button button--main form__open" role="switch">Запись на приём к офтальмологу</button> <button type="submit" class="button button--second form__submit">Записаться</button>
	</fieldset><button class="cross cross--white form__close" type="button" aria-label="Кнопка закрыть"></button>
</form>
<section class="about">
	<div class="about__content">
		<h1 class="about__title">Оптика и офтальмология<br>в Воронеже</h1>
		<p class="about__text">Прием врача-офтальмолога для подбора сложной и индивидуальной коррекции:</p>
		<ul>
			<li>ортокератология</li>
			<li>призматическая коррекция</li>
			<li>иррегулярный астигматизм (при кератоконусе, рубцах роговицы, после травм и оперативных
				вмешательств).</li>
		</ul>
		<p class="about__text">Приём офтальмолога осуществляется по предварительной записи по тел. <a href="tel:+7(473)3003677">+7 (473) 300-36-77</a></p>
		<p class="about__text">Подбор и изготовление средств коррекции всех типов зрительных нарушений. В
			зависимости от сложности подбор может осуществляться как врачом-офтальмологом, так и медицинским
			оптиком-оптометристом.</p>
		<p class="about__text">Подбор очков и контактных линз при миопии, гиперметропии, пресбиопии,
			астигматизме может осуществляться без предварительной записи, при наличии свободных специалистов.
		</p>
	</div>
</section>
<section class="services">
	<h2 class="visually-hidden">Наши услуги</h2>
	<article class="services__item services__item--doc">
		<h3 class="services__title">Медицинские<br>услуги</h3><a class="button button--second services__link" href="/">Подбор<br>очков </a><a class="button button--main services__link" href="/">Подбор<br>контактных линз</a>
	</article>
	<article class="services__item services__item--lens">
		<h3 class="services__title">Изготовление<br>и ремонт очков</h3><a class="button button--second services__link" href="/">Производство<br>очков </a><a class="button button--main services__link" href="/">Ремонт<br>очков</a>
	</article>
	<section class="advantages">
		<div class="content advantages__content">
			<h2 class="advantages__title">Современная офтальмология</h2>
			<div class="advantages__item">
				<picture class="advantages__img">
					<source srcset="/img/doc.png" media="(min-width: 768px)"><img src="/img/doc_mb.png" alt="Фотография доктора">
				</picture>
				<p class="advantages__text">Работаем в формате "ОПТИКА+", наши возможности в сферах подбора
					коррекции, диагностики нарушений и изготовления средств коррекции превосходят возможности
					обычной оптики.</p>
			</div>
			<div class="advantages__item">
				<picture class="advantages__img">
					<source srcset="/img/lenses.png" media="(min-width: 768px)"><img src="/img/lenses_mb.png" alt="Контактные линзы">
				</picture>
				<p class="advantages__text">Подбор жестких склеральных контактных линз с использованием
					оптической когерентной томографии (OCT) переднего отрезка для определения оптимальных
					параметров линз.</p>
			</div>
			<div class="advantages__item">
				<picture class="advantages__img">
					<source srcset="/img/glass.png" media="(min-width: 768px)"><img src="/img/glass_mb.png" alt="Фотография очков">
				</picture>
				<p class="advantages__text">Линзы для очков ведущих мировых проиpводителей: Zeiss, Rodensrock,
					Essilor, Hoya от официальных поставщиков, в наличии и на заказ. Также есть возможность
					прямого заказа любых очковых линз данных производителей.</p>
			</div>
			<div class="advantages__item">
				<picture class="advantages__img">
					<source srcset="/img/doc2.png" media="(min-width: 768px)"><img src="/img/doc2_mb.png" alt="Фотография доктора с рентген снимками">
				</picture>
				<p class="advantages__text">Контроль миопии - подбор специализированных мягких контактных линз
					или ночных (ортокератологических) линз для замедления развития близорукости. Прием ведут
					детские врачи-офтальмологи, прошедшие специализированные курсы обучения по подбору данных
					видов коррекции.</p>
			</div>
			<div class="advantages__item">
				<picture class="advantages__img">
					<source srcset="/img/baloon.png" media="(min-width: 768px)"><img src="/img/baloon_mb.png" alt="Фотография воздушного шара">
				</picture>
				<p class="advantages__text">Подбор как стандартных (серийных) очков и контактных линз, так и
					сложной и специальной коррекции (офисная, прогрессивная, призматическая очковая коррекция;
					контактные линзы для контроля миопии (с периферическим дефокусом), астигматические,
					мультифокальные, индивидуального изготовления)</p>
			</div>
			<div class="advantages__item">
				<picture class="advantages__img">
					<source srcset="/img/girl.png" media="(min-width: 768px)"><img src="/img/girl_mb.png" alt="Фотография девушки в очках">
				</picture>
				<p class="advantages__text">Подбор и изготовление очков и контактных линз для спортивных
					занятий: цветофильтры, ортокератология, изготовление спортивных очков и оправ, а также очки
					для плавания с диоптриями.</p>
			</div>
		</div>
	</section>
</section>
<section class="brands">
	<div class="content brands__content">
		<h3>Представленные бренды</h3>
		<div class="brands__slider">
			<div class="brands-slider swiper">
				<div class="swiper-wrapper brands-slider__wrapper">
					<div class="swiper-slide"><img src="/img/brand-1.jpg" alt=""></div>
					<div class="swiper-slide"><img src="/img/brand-2.jpg" alt=""></div>
					<div class="swiper-slide"><img src="/img/brand-3.jpg" alt=""></div>
					<div class="swiper-slide"><img src="/img/brand-1.jpg" alt=""></div>
					<div class="swiper-slide"><img src="/img/brand-2.jpg" alt=""></div>
					<div class="swiper-slide"><img src="/img/brand-3.jpg" alt=""></div>
					<div class="swiper-slide"><img src="/img/brand-1.jpg" alt=""></div>
				</div>
			</div>
			<div class="swiper-controls">
				<div class="swiper-pagination"></div><button class="swiper-button-prev"></button> <button class="swiper-button-next"></button>
			</div>
		</div>
	</div>
</section>
<section class="reviews">
	<div class="content reviews__content">
		<h3 class="reviews__title">Отзывы</h3>
		<div class="reviews__link-block link-block"><span class="link-block__num">4.5</span>
			<p class="link-block__title">Отзывы в Яндексе</p><a class="link-block__link" href="/">перейти к
				отзывам</a>
		</div>
		<div class="reviews__slider">
			<div class="reviews-slider">
				<div class="swiper-wrapper">
					<blockquote class="reviews-slider__item swiper-slide"><cite class="reviews-slider__author">Дмитрий Никонорович Мельников</cite> <time class="reviews-slider__date">01.01.2022</time>
						<p class="reviews-slider__text">Осуществляется подбор и изготовление средств коррекции
							всех типов зрительных нарушений. В зависимости от сложности подбор может
							осуществляться как врачом-офтальмологом, так и медицинским оптиком-оптометристом.
						</p><a href="/" class="reviews-slider__link" aria-label="Перейти к отзыву"></a>
					</blockquote>
					<blockquote class="reviews-slider__item swiper-slide"><cite class="reviews-slider__author">Алевтина Павловна Непомнящая</cite> <time class="reviews-slider__date">01.01.2022</time>
						<p class="reviews-slider__text">Lorem ipsum dolor sit amet, consectetur adipisicing
							elit. Aliquid, nesciunt.</p><a href="/" class="reviews-slider__link" aria-label="Перейти к отзыву"></a>
					</blockquote>
					<blockquote class="reviews-slider__item swiper-slide"><cite class="reviews-slider__author">Серафим Петрович Маркин</cite> <time class="reviews-slider__date">01.01.2022</time>
						<p class="reviews-slider__text">Lorem ipsum dolor sit amet, consectetur adipisicing
							elit. At consequuntur laudantium nam officia quod rem suscipit veritatis.
							Accusantium adipisci architecto aut consectetur consequuntur distinctio ducimus enim
							eum facilis laborum libero molestias nihil obcaecati, odit omnis placeat provident
							quae quaerat quam quasi recusandae rem, suscipit vitae. Earum et in velit
							voluptatibus?</p><a href="/" class="reviews-slider__link" aria-label="Перейти к отзыву"></a>
					</blockquote>
					<blockquote class="reviews-slider__item swiper-slide"><cite class="reviews-slider__author">Серафим Петрович Маркин</cite> <time class="reviews-slider__date">01.01.2022</time>
						<p class="reviews-slider__text">Lorem ipsum dolor sit amet, consectetur adipisicing
							elit. At consequuntur laudantium nam officia quod rem suscipit veritatis.
							Accusantium adipisci architecto aut consectetur consequuntur distinctio ducimus enim
							eum facilis laborum libero molestias nihil obcaecati, odit omnis placeat provident
							quae quaerat quam quasi recusandae rem, suscipit vitae. Earum et in velit
							voluptatibus?</p><a href="/" class="reviews-slider__link" aria-label="Перейти к отзыву"></a>
					</blockquote>
				</div>
			</div>
			<div class="swiper-controls">
				<div class="swiper-pagination"></div><button class="swiper-button-prev"></button> <button class="swiper-button-next"></button>
			</div>
		</div>
	</div>
</section>
<section class="our">
	<h2>Салон оптики в Воронеже</h2>
	<div class="our__slider">
		<div class="swiper our-slider">
			<div class="swiper-wrapper">
				<div data-src="/img/our-1.jpg" class="swiper-slide our-slider__slide" data-fancybox><img src="/img/our-1.jpg" alt=""></div>
				<div data-src="/img/our-2.jpg" class="swiper-slide our-slider__slide" data-fancybox><img src="/img/our-2.jpg" alt=""></div>
				<div data-src="/img/our-3.jpg" class="swiper-slide our-slider__slide" data-fancybox><img src="/img/our-3.jpg" alt=""></div>
				<div data-src="/img/our-4.jpg" class="swiper-slide our-slider__slide" data-fancybox><img src="/img/our-4.jpg" alt=""></div>
			</div>
		</div>
		<div class="swiper-controls">
			<div class="swiper-pagination"></div><button class="swiper-button-prev"></button> <button class="swiper-button-next"></button>
		</div>
	</div>
</section>
<article class="feedback">
	<div class="feedback__content">
		<p class="feedback__title">Запишитесь на консультацию к специалисту</p>
		<p class="feedback__subtitle">Оставьте заявку, и наши специалисты свяжутся с вами в ближайшее время</p>
		<form action="/" class="form feedback__form">
			<fieldset class="form__wrapper">
				<legend class="form__legend visually-hidden">Записаться на прием</legend><input class="input form__item" placeholder="Имя" aria-label="Имя"> <input type="tel" class="input form__item" placeholder="Телефон" aria-label="Телефон"> <input class="input-date form__item" placeholder="дд.мм.гггг" aria-label="Дата приема">
				<p class="form__attention">Нажимая кнопку “Записаться”<br>Вы даете свое согласие на <a href="/" target="_blank">обработку персональных данных.</a></p><button type="submit" class="button button--main form__open" role="switch">Записаться</button>
			</fieldset>
		</form>
	</div>
</article>
<div id="map" class="map">
	<script class="ymap-lazy" async data-src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Accbcf44b282cefe9bfef0dcb66d57c99c01f8698fc154fb4c815764f13c4cb3b&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
</div>