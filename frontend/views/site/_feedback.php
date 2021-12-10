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
				<button type="submit" class="button button--main form__open">Записаться</button>
			</fieldset>
		</form>
	</div>
</article>