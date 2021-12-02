<section class="about">
	<div class="content">
		<h2><?= Yii::$app->settings->get('Settings.the_title_of_the_text_about_the_company') ?></h2>
		<div><?= Yii::$app->settings->get('Settings.the_text_about_the_company_one') ?></div>
		<article class="advantages">
			<h3 class="visually-hidden">Преимущества</h3>
			<div class="advantages-block advantages__item">
				<abbr class="advantages-block__icon">&#xe905;</abbr>
				<p class="advantages-block__text">
					<b>Ассортимент:</b>
					<br>Свыше 25000 товаров в наличии на складе.
				</p>
			</div>
			<div class="advantages-block advantages__item">
				<abbr class="advantages-block__icon">&#xe90a;</abbr>
				<p class="advantages-block__text">
					<b>Актуальность:</b>
					<br>Среди наших товаров современные промышленные решения и новинки производства.
				</p>
			</div>
			<div class="advantages-block advantages__item">
				<abbr class="advantages-block__icon">&#xe901;</abbr>
				<p class="advantages-block__text">
					<b>Индивидуальный подход:</b>
					<br>Для частных лиц, постоянных клиентов, предпреятий, ИП.
				</p>
			</div>
			<div class="advantages-block advantages__item">
				<abbr class="advantages-block__icon">&#xe906;</abbr>
				<p class="advantages-block__text">
					<b>Опыт:</b>
					<br>Работаем с 2003 года.
				</p>
			</div>
		</article>
	</div>
</section>