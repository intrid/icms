<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\datetime\DateTimePicker;


/* @var $this yii\web\View */
/* @var $model common\models\Review */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="review-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="tabs-block">
        <ul class="tabs-list clearfix">
            <li class="active">
                <a data-toggle="tab" href="#panel_1" class="active" href="">Основные параметры</a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="panel_1" class="tab-pane fade in active">

                <div class="row">

                    <div class="col-sm-9">

                        <div class="col-lg-5">
                            <?= $form->field($model, 'name')->textInput(); ?>
                        </div>

                        <div class="col-lg-5">
                            <?= $form->field($model, 'link')->textInput();; ?>
                        </div>

                        <div class="col-sm-2">
                            <?= $form->field($model, 'created_at_str')->widget(DatePicker::classname(), [
                                'options' => ['placeholder' => 'Введите время ...'],
                                'pluginOptions' => [
                                    'convertFormat' => true,
                                    'autoclose' => true,
                                    'format' => 'd.m.yyyy',
                                    'language' => 'ru',
                                    'weekStart' => 1, //неделя начинается с понедельника
                                    'todayBtn' => true, //снизу кнопка "сегодня"
                                ]
                            ]);
                            ?>
                        </div>


                        <div class="col-lg-12">
                            <?= $form->field($model, 'text')->textInput(['onkeyup' => 'myVar.lenghtChar(this)'])
                                ->textarea(['rows' => 6]) ?>
                        </div>


                    </div>

                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="pull-left pull-left-check">
                                    <?php echo $form->field($model, 'is_published', ['options' => ['class' => 'form-group cust-checkbox'], 'template' => '<label> {input} <span class="cust-checkbox__box"></span> Опубликовать </label>'])->checkbox([], false);  ?>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-flat btn-info']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>