<?php
use yii\helpers\Html;
?>
<div class="icms_review">
	<p>Добрый день! Письмо из админки сайта: "<?= Yii::$app->name ?>"</p>

	<?php if (!empty($post['name'])){
		echo '<p><b>Отправитель: </b><i>' . htmlspecialchars($post['name'], ENT_QUOTES) . '</i></p>';
	}else{
		echo '<p><b>Отправитель: </b><i>' . $textNull . '</i></p>';
	} 
	?>
	<?= '<p><b>Телефон: </b><i>' . htmlspecialchars($post['phone'], ENT_QUOTES);?>
	<?php if (!empty($post['comment'])){
		echo '<p><b>Комментарий: </b><i>' . htmlspecialchars($post['comment'], ENT_QUOTES) . '</i></p>';
	}else{
		echo '<p><b>Комментарий: </b><i>' . $textNull . '</i></p>';
	} 
	?>

	<h4>Для отправки ответа на сайте указаны следующие контактные данные:</h4>

	<ul>
		<li>E-mail для уведомления о новых заказах / обратный адрес при рассылке: <?= Yii::$app->settings->get('Settings.email') ?></li>
		<li>E-mail: <?= Yii::$app->settings->get('Settings.emailLayots') ?></li>
		<li>Телефон: <?= Yii::$app->settings->get('Settings.phoneLayots') ?></li>
	</ul>
</div>