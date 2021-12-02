<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Tests */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile(Yii::$app->request->baseUrl . '/js/test/test_form.js', ['depends' => \backend\assets\AppAsset::class]);
?>

<div class="tests-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?= Html::encode($this->title) ?></h3>  
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>                
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($model, 'procent')->textInput() ?>                 
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-sm-12" data-div-form="true">
                            <?php
                            $jsonData = $model->getJsonData();
                            $i = 0;
                            foreach ($jsonData as $key => $value):
                                echo $this->render('__formQuestion', ['model' => $value, 'i' => $i]);
                                $i++;
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-6">
                            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                        </div>
                        <div class="col-sm-6 ">
                            <a class="btn btn-github pull-right" data-add-test="true" href="<?= \yii\helpers\Url::to(['/tests/add-test']) ?>" data-count="<?=$i?>">Добавить вопрос</a>                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
