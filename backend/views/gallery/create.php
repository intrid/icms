<?php

use yii\helpers\Html;

$this->title = 'Добавление';
$this->params['breadcrumbs'][] = ['label' => 'Бренды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="ge-create">
    <div class="row">
		<div class="col-sm-6">
			<div class="box">
				<div class="box-header with-border">
					<div style="float: left">
						<h3 class="box-title">Новый бренд</h3>
					</div>
				</div>
				<div class="box-body">
					<?= $this->render('_form', ['model' => $model]) ?>
				</div>
			</div>
		</div>
	</div>
</div>