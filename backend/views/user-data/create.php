<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserData */

$this->title = 'Добавление пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
?>
<div class="user-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelUser' => $modelUser,
    ]) ?>

</div>
