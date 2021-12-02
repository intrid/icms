<?php

use common\models\ArticleCategory;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\widgets\ckeditor\CkeditorMy;
use kartik\date\DatePicker;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;


$idForm = $model->isNewRecord ? 'form-article-create' : 'form-article-update';
?>

<div class="article-form">
    <?php $form = ActiveForm::begin(['id' => $idForm]); ?>
    <div class="tabs-block">
        <ul class="tabs-list clearfix">
            <li class="active">
                <a data-toggle="tab" href="#panel_article_1">
                    <span>Основные параметры</span>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="panel_article_1" class="tab-pane fade in active">
                <div id="data-modal-article-form">
                    <div class="row">

                        <div class="col-sm-8">
                            <div class="col-sm-12">
                                <?= $form->field($model, 'name')->textInput() ?>
                            </div>
                            <div class="col-sm-12">
                                <?= $form->field($model, 'short_text')->textarea(['rows' => 4]) ?>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="pull-right pull-right-check">
                                <?php echo $form->field($model, 'visibility', ['options' => ['class' => 'form-group cust-checkbox'], 'template' => '<label> {input} <span class="cust-checkbox__box"></span> Опубликовать</label>'])->checkbox([], false);  ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <?= $form->field($model, 'prev')->fileInput(['accept' => "image/jpeg, image/png"])->label('Главное фото') ?>
                            <?php
                            $images[] = $model->getImage();
                            if (!empty($images)) {
                                print $this->render('../common/_view_images', compact('images', 'model'));
                            }
                            ?>
                        </div>

                        <div class="col-sm-8">
                            <?= $form->field($model, 'images[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label('Изображения'); ?>
                            <?php
                            $images = $model->getImages();
                            if (!empty($images)) {
                                print $this->render('../common/_view_images', compact('images', 'model'));
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="form-group text-left">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-flat btn-info']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>