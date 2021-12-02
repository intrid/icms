<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Users */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="users-form">

    <?php $form = ActiveForm::begin([
         'enableClientValidation'=> false, 
    ]); ?>

    <div class="row">
        <div class="col-sm-6">
            <div class="box box-info shadow">
                <div class="box-header with-border">
                    <h3 class="box-title">Основные данные</h3>
                </div>
                <div class="box-body">

                    <?= $form->field($model, 'username')->textInput(['maxlength' => true,'placeholder' => 'Username'])->label('Имя пользователя') ?>
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email'])->label('Email') ?>

                    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true, 'placeholder' => 'Password'])->label('Пароль') ?>
                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-flat btn-info']) ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php ActiveForm::end(); ?>
</div>
