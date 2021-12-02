<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\goods\Good */

$this->title = 'Добавить новый товар';
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['/good/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="good-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
