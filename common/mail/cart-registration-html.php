<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $user common\models\User */

?>
<div class="password-reset">
    <p>Добрый день, <?= Html::encode($user->userData->user_fio) ?>,</p>

    <p>
        <span>Благодарим за регистрацию на нашем сайте: </span>
        <a href="<?= Url::to( '/', true ); ?>" ><?= Yii::$app->name; ?></a>
    </p>

    <p>Логин: <?=$user->email?></p>
    <p>Пароль: <?=$password?></p>
</div>