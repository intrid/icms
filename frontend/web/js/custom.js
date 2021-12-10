$(document).ready(function () {

    $('.form').on('submit', function (e) {

        e.preventDefault();
        let formData = $(this).serialize();

        $.ajax({
            type: 'get',
            url: '/submit/order',
            data: formData,
            success: function (res) {
                const message = document.createElement('div');
                // ф-ция чтобы закрыть окно по клику на документ
                const closePopup = function (e) {
                    const target = e.target;
                    if (!message.contains(target)) {
                        message.remove();
                        document.removeEventListener('click', closePopup);
                    }
                };

                message.tabIndex = 0;
                message.className = 'message-popup';
                message.innerHTML = `
						<h2><span>Спасибо</span></h2>
						<p>Заявка создана. C Вами свяжутся в ближайшее время</p>
						<button class="cross cross--blue message-popup__close" 
							aria-label="Кнопка закрыть"></button>
					`;
                document.body.append(message);
                message.focus();
                // закрываем попуп
                message.addEventListener('click', function (e) {
                    const target = e.target;
                    if (target.matches('.message-popup__close')) {
                        message.remove();
                    }
                });
                document.addEventListener('click', closePopup)

            },
            error: function (error) {
                console.log(error);
            }
        });

        // Очищаем поля формы
        $(this).find(':input').val('');
    });


});