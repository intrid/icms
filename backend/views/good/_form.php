<?php

use common\models\Brands;
use common\models\Category;
use common\models\Color;
use common\models\goods\GoodColor;
use common\models\goods\GoodTypes;
use common\models\goods\GoodSizes;
use common\models\Reason;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use common\widgets\ckeditor\CkeditorMy;
use yii\widgets\DetailView;
use kartik\datetime\DateTimePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Goods */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile("@web/js/good/compositions.js");

$modelName = "goods";
$idForm = $model->isNewRecord ? 'form-goods-create' : 'form-goods-update';



$seo = $model->getSeo();
?>

<div class="goods-form">



    <?php $form = ActiveForm::begin(['id' => $idForm]); ?>

    <div class="tabs-block">
        <ul class="tabs-list clearfix">
            <li class="active">
                <a data-toggle="tab" href="#panel_goods_1">
                    <span>Основные параметры</span>
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#panel_goods_2">
                    <span>SEO</span>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="panel_goods_1" class="tab-pane fade in active">
                <div id="data-modal-goods-form">
                    <div class="row">
                        <div class="col-sm-8">


                            <div class="col-sm-12">

                                
                                <div class="col-sm-12">

                                    <table id="w0" class="table table-striped table-bordered detail-view">
                                        <tbody>
                                            <tr>
                                                <th>Категория ур. 1</th>
                                                <td>Котельное оборудование</td>
                                            </tr>
                                            <tr>
                                                <th>Категория ур. 2</th>
                                                <td>Котлы газовые</td>
                                            </tr>
                                            <tr>
                                                <th>Категория ур. 3</th>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <th>Номинальная тепловая мощность, кВт</th>
                                                <td>31,5</td>
                                            </tr>
                                            <tr>
                                                <th>Номинальная тепловая нагрузка, кВт</th>
                                                <td>34,8</td>
                                            </tr>
                                            <tr>
                                                <th>Масса, кг</th>
                                                <td>122</td>
                                            </tr>
                                            <tr>
                                                <th>Размеры, ВхШхГ, мм</th>
                                                <td>850-585-600</td>
                                            </tr>
                                            <tr>
                                                <th>Газопровод</th>
                                                <td>R 3/4</td>
                                            </tr>
                                            <tr>
                                                <th>Под./обр. линии</th>
                                                <td>R1</td>
                                            </tr>
                                            <tr>
                                                <th>Под./обр. линии: R1</th>
                                                <td>150</td>
                                            </tr>
                                            <tr>
                                                <th>URL</th>
                                                <td><?=$model->slug?></td>
                                            </tr>
                                        </tbody>
                                    </table>
   
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">

                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="pull-left pull-left-check">
                                        <?php echo $form->field($model, 'visibility', ['options' => ['class' => 'form-group cust-checkbox'], 'template' => '<label> {input} <span class="cust-checkbox__box"></span> Опубликовать </label>'])->checkbox([], false);  ?>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="pull-left pull-left-check">
                                        <?php echo $form->field($model, 'view_main', ['options' => ['class' => 'form-group cust-checkbox'], 'template' => '<label> {input} <span class="cust-checkbox__box"></span> Отображать на главной </label>'])->checkbox([], false);  ?>
                                    </div>
                                </div>

                            </div>

                            <div class="img-good">
                                <?= $form->field($model, 'prev')->fileInput(['accept' => "image/jpeg, image/png"])->label('Главное фото') ?>

                                <?php
                                $images[] = $model->getImage();
                                if (!empty($images)) {

                                    print $this->render('../common/_view_images', compact('images', 'model'));
                                }
                                ?>

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


            <div id="panel_goods_2" class="tab-pane fade">
                <div id="data-modal-goods-seo">
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($seo, 'h1')->textInput(['onkeyup' => 'myVar.lenghtChar(this)']) ?>
                            <span class="coiuntCharPr">Кол-во символов: <span data-count-lenght='seo-h1'><?= mb_strlen($seo->h1) ?></span></span>
                            <?= $form->field($seo, 'title')->textInput(['onkeyup' => 'myVar.lenghtChar(this)']) ?>
                            <span class="coiuntCharPr">Кол-во символов: <span data-count-lenght='seo-title'><?= mb_strlen($seo->title) ?></span></span>
                            <?= $form->field($model, 'slug')->textInput() ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($seo, 'keywords')->textInput(['onkeyup' => 'myVar.lenghtChar(this)']) ?>
                            <span class="coiuntCharPr">Кол-во символов: <span data-count-lenght='seo-keywords'><?= mb_strlen($seo->keywords) ?></span></span>
                            <?= $form->field($seo, 'description')->textarea(['rows' => 4, 'onkeyup' => 'myVar.lenghtChar(this)']) ?>
                            <span class="coiuntCharPr">Кол-во символов: <span data-count-lenght='seo-description'><?= mb_strlen($seo->description) ?></span></span>

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