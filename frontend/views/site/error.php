<?php

use yii\helpers\Html;

$this->title = 'Error 404';
?>
<div class="container">
	<div class="row">
		<div class="col-sm-5">
		</div>
		<div class="col-sm-2">
			<div class="site-error">
				<br>
				<br>
				<h1><?= Html::encode($this->title) ?></h1>
				<h2><p>Запрашиваемая страница не существует</p></h2>
			</div>
			<div class="text-center">
			<h2><a href="/" class="btn-intrid">Перейти на главную</a></h2>
			</div>
		</div>
		<div class="col-sm-5">
		</div>
	</div>
</div>