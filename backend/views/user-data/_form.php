<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use common\widgets\ckeditor\CkeditorMy;
use mihaildev\elfinder\ElFinder;
use rico\yii2images\behaviors\ImageBehave;
use kartik\select2\Select2;

$modelName = "userdata";
$idFormUserdata = $model->isNewRecord ? 'form-userdata-create' : 'form-userdata-update';
$url = $model->isNewRecord ? Url::to(['create']) : Url::to(['update', 'id' => $model->id]);
?>

<div class="userdata-form">

    <?php $form = ActiveForm::begin(['id' => $idFormUserdata, 'action' => $url]); ?>

    <div class="tabs-block">
        <ul class="tabs-list clearfix">
            <li class="active">
                <a data-toggle="tab" href="#panel_userdata_1">
                    <span>Основные параметры</span>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="panel_userdata_1" class="tab-pane fade in active">
                <div id="data-modal-userdata-form">

                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'repeatpassword')->textInput(['maxlength' => true]) ?>

                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'user_fio')->textInput() ?>
                            <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::class, ['mask' => '+7 (999) 999-9999']) ?>
                            <?= $form->field($model, 'type_user')->dropDownList(\common\models\UserData::getTypeUser()) ?>
                        </div>
                        <div class="col-sm-4" >
                            <?php
                            echo $form->field($modelUser, 'city')->widget(Select2::classname(), [
                                'data' => common\models\City::getForSelect2(),
                                'options' => ['placeholder' => 'Выберите город', 'multiple' => false],
                                'pluginOptions' => [
                                    'tabindex' => false,
                                    'tags' => true,
                                    'tokenSeparators' => [',', ' '],
                                ],
                            ])->label('Город');
                            ?>
                            <?php
                            echo $form->field($modelUser, 'shop_id')->widget(Select2::classname(), [
                                'data' => common\models\Shops::getForSelect2(),
                                'options' => ['placeholder' => 'Выберите магазин', 'multiple' => false],
                                'pluginOptions' => [
                                    'tabindex' => false,
                                    'tags' => true,
                                    'tokenSeparators' => [',', ' '],
                                ],
                            ])->label('Магазины');
                            ?>
                            <?= $form->field($model, 'subscribe')->checkbox() ?>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <div class="form-group text-right">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
