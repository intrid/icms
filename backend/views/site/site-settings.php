<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\ChangePasswordForm;
use yii\helpers\Url;
use common\widgets\ckeditor\CkeditorMy;
use mihaildev\elfinder\ElFinder;

$change_pass_form = new ChangePasswordForm();

Yii::$app->cache->flush();
Yii::$app->frontendCache->flush();
$settings = Yii::$app->settings;
$socials = json_decode($settings->get('Settings.socials_network'));
$settings->clearCache();


$modelName = "settings";



$this->registerJsFile("@web/js/site/index.js");

?>

<div class="site-index" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div class="col-sm-10">
            <div class="box">
                <div class="box-header with-border">
                    <div style="float: left">
                        <h3 class="box-title">Настройки сайта</h3>
                    </div>
                </div>
                <div class="box-body">

                    <!-- <?php //if (Yii::$app->user->can('updateSettings')) : 
                            ?> -->
                    <?php $form = ActiveForm::begin(['id' => 'site-settings-form']); ?>
                    <div class="tabs-block">
                        <ul class="tabs-list clearfix">

                            <li class="active">
                                <a data-toggle="tab" href="#panel-settings-main">
                                    <span>Основные</span>
                                </a>
                            </li>

                            <li>
                                <a data-toggle="tab" href="#panel-settings-seo">
                                    <span>SEO главной страницы</span>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#panel-settings-agreement">
                                    <span>Обработка персональных данных</span>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#panel-settings-smtp">
                                    <span>Настройки почтового сервера</span>
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content">

                            <div id="panel-settings-main" class="tab-pane fade in active">
                                <div id="data-modal-settings-main">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                                            <?= $form->field($model, 'address_place')->textInput(['maxlength' => true]) ?>
                                            <?= $form->field($model, 'yandex_score')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <?= $form->field($model, 'phone_one')->textInput(['maxlength' => true]) ?>
                                            <?= $form->field($model, 'map_city_one')->textInput(['maxlength' => true]) ?>
                                            <?= $form->field($model, 'yandex_link')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-sm-12">
                                            <?= $form->field($model, 'advantages')->widget(CkeditorMy::class, []) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="panel-settings-seo" class="tab-pane fade">
                                <div id="data-modal-settings-seo">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <?= $form->field($model, 'h1')->textInput(['maxlength' => true, 'onkeyup' => 'myVar.lenghtChar(this)']) ?>
                                            <span class="coiuntCharPr">Кол-во символов: <span data-count-lenght='<?= $modelName ?>-h1'><?= mb_strlen($model->h1) ?></span></span>
                                            <?= $form->field($model, 'the_text_about_the_company_one')->widget(CkeditorMy::class, []) ?>
                                        </div>
                                        <div class="col-sm-5">

                                            <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'onkeyup' => 'myVar.lenghtChar(this)']) ?>
                                            <span class="coiuntCharPr">Кол-во символов: <span data-count-lenght='<?= $modelName ?>-title'><?= mb_strlen($model->title) ?></span></span>
                                            <?= $form->field($model, 'keywords')->textInput(['maxlength' => true, 'onkeyup' => 'myVar.lenghtChar(this)']) ?>
                                            <span class="coiuntCharPr">Кол-во символов: <span data-count-lenght='<?= $modelName ?>-keywords'><?= mb_strlen($model->keywords) ?></span></span>
                                            <?= $form->field($model, 'description')->textarea(['rows' => 7, 'onkeyup' => 'myVar.lenghtChar(this)']) ?>
                                            <span class="coiuntCharPr">Кол-во символов: <span data-count-lenght='<?= $modelName ?>-description'><?= mb_strlen($model->description) ?></span></span>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="panel-settings-agreement" class="tab-pane fade">
                                <div id="data-modal-settings-agreement">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <?= $form->field($model, 'domain')->textInput(); ?>
                                            <?= $form->field($model, 'org_name')->textInput(); ?>
                                            <?= $form->field($model, 'org_address')->textInput(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="panel-settings-smtp" class="tab-pane fade">
                                <div id="data-modal-settings-smtp">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <?= $form->field($model, 'smtp_username')->textInput(['maxlength' => true]) ?>
                                                </div>
                                                <div class="col-sm-6">
                                                    <?= $form->field($model, 'smtp_password')->textInput(['maxlength' => true]) ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <?= $form->field($model, 'smtp_host')->textInput(['maxlength' => true]) ?>
                                                </div>

                                                <div class="col-sm-4">
                                                    <?= $form->field($model, 'smtp_port')->input('number') ?>
                                                </div>

                                                <div class="col-sm-4">
                                                    <?= $form->field($model, 'smtp_encrypt')->dropDownList(['ssl' => 'SSL', 'tls' => 'TLS']) ?>
                                                </div>
                                            </div>
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
            </div>
        </div>
    </div>

</div>