<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['/user/default/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Добрый день, <?= Html::encode($user->username) ?>,</p>

    <p>Для сброса пароля перейдите по ссылке ниже:</p>

    <p><?= Html::a('Ссылка на восстановление пароля', $resetLink) ?></p>
</div>
