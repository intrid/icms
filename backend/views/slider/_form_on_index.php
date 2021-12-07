<?php

use common\widgets\ckeditor\CkeditorMy;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="portfolio-form">

    <?php $form = ActiveForm::begin(['action' => '/icms/slider/create']); ?>

    <div class="tabs-block">

        <div class="tab-content">
            <div id="panel-portfolio-1" class="tab-pane fade in active">
                <div id="data-modal-portfolio-main">

                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'name')->widget(CkeditorMy::class, []) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-9">
                            <?= $form->field($model, 'prev')->fileInput(['accept' => "image/jpeg, image/png"])->label('Изображение (1920x488)') ?>
                        </div>
                        <div class="col-sm-3">
                            <div class="pull-right pull-right-check">
                                <?php echo $form->field($model, 'visibility', ['options' => ['class' => 'form-group cust-checkbox'], 'template' => '<label> {input} <span class="cust-checkbox__box"></span> Опубликовать</label>'])->checkbox([], false);  ?>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <?= $form->field($model, 'prev_tablet')->fileInput(['accept' => "image/jpeg, image/png"])->label('Изображение (1280x326)') ?>
                        </div>
                        <div class="col-sm-12">
                            <?= $form->field($model, 'prev_mobile')->fileInput(['accept' => "image/jpeg, image/png"])->label('Изображение (768x378)') ?>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="form-group text-right">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>