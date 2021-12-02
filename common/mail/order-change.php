<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */
?>
<div class="password-reset">
    <p>Добрый день, <?= Html::encode($user->userData->user_fio) ?>,</p>

    <p>Заказ №<?= $model->number ?>, был изменен</p>
    <p>Для получения подробной информации зайдите в свой <a href="https://vsmete.ru/lk">личный кабинет</a> </p>


</div>