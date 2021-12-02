<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tests */

$this->title = 'Редактирование теста : "' . $model->name.'"';
$this->params['breadcrumbs'][] = ['label' => 'Тесты', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирвание';
?>
<div class="tests-update">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
