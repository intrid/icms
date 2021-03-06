<form action="/submit/order" method="get" class="form form--after-banner">
	<fieldset class="form__wrapper">
		<legend class="form__legend visually-hidden">Записаться на прием</legend>
		<input class="input form__item" placeholder="Имя" aria-label="Имя" name="name" required>
		<input type="tel" class="input form__item" placeholder="Телефон" aria-label="Телефон" name="phone" required>
		<input class="input-date form__item" placeholder="дд.мм.гггг" aria-label="Дата приема" name="date">
		<p class="form__attention">
			Нажимая кнопку “Записаться”
			<br>Вы даете свое согласие на <a href="/polytic" target="_blank">обработку персональных данных.</a>
		</p>
		<button type="button" class="button button--main form__open" role="switch">Запись на приём к офтальмологу</button>
		<button type="submit" class="button button--second form__submit">Записаться</button>
	</fieldset>
	<button class="cross cross--white form__close" type="button" aria-label="Кнопка закрыть"></button>
</form>