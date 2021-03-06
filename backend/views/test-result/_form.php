<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TestResult */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-result-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'id_shop')->textInput() ?>

    <?= $form->field($model, 'id_test')->textInput() ?>

    <?= $form->field($model, 'result')->textInput() ?>

    <?= $form->field($model, 'procent')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
