<?php

use yii\widgets\ActiveForm;

$this->title = "Восстановление пароля"

?>

<div class="container">
    <div class="">
        <?php $form = ActiveForm::begin([
            'action' => '/user/default/reset-password',
            'method' => 'POST',
            'id' => 'change-password',
            'options' => [
                'class' => 'change-password-form'
            ]
        ]); ?>
        <?= $form->field($changePasswordForm, 'password')->textInput(['class' => 'input modal-form__item', 'placeholder' => 'Пароль', 'type' => 'password'])->label(false); ?>
        <?= $form->field($changePasswordForm, 'password_repeat')->textInput(['class' => 'input modal-form__item', 'placeholder' => 'Повторить пароль', 'type' => 'password'])->label(false); ?>
        <?= $form->field($changePasswordForm, 'reset_hash')->hiddenInput(['value' => Yii::$app->request->get('token')])->label(false); ?>
        <button class="button main-button modal-form__submit" type="submit">Сохранить</button>
        <?php ActiveForm::end(); ?>
    </div>
</div>
