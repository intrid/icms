<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = 'Редактирование страницы ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Страницы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name];
?>
<div class="page-update">
    <div class="row">
		<div class="col-sm-11">
			<div class="box">
				<div class="box-header with-border">
					<div style="float: left">
						<h3 class="box-title"><?= $this->title;?></h3>
					</div>
				</div>
				<div class="box-body">
					<?= $this->render('_form', ['model' => $model]) ?>
				</div>
			</div>
		</div>
	</div>
</div>
