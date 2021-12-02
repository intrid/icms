<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserData */

$this->title = 'Редактирование пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_fio];
?>
<div class="user-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelUser' => $modelUser
    ]) ?>

</div>
