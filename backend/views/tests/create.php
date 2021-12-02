<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tests */

$this->title = 'Добавление теста';
$this->params['breadcrumbs'][] = ['label' => 'Тесты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tests-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
