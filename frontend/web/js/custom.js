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
				message.className = 'message-popup';
				message.innerHTML = `
						<h2><span>Спасибо</span></h2>
						<p>Заявка создана. C Вами свяжутся в ближайшее время</p>
					`;
				document.body.append(message);
				setTimeout(function () {
					message.remove();
				}, 3000);
			},
			error: function (error) {
				console.log(error);
			}
		});

	});

});