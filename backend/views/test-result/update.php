<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TestResult */

$this->title = 'Update Test Result: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Test Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="test-result-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
