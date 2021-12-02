<?php

use common\models\Article;
use common\models\Gallery;
use kartik\editable\Editable;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

$this->registerJsFile(Yii::$app->request->baseUrl . '/js/dropDown/dropDown.js', ['depends' => backend\assets\AppAsset::class]);

$this->title = 'Галереи';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
  <div class="col-sm-8">
    <div class="box">
      <div class="box-header with-border">
        <div style="float: left">
          <h3 class="box-title"><?= $this->title; ?></h3>
        </div>
        <div class="pull-right btn-group">
            <?= Html::a('Добавить галерею', ['create'], ['class' => 'btn btn-flat btn-info']); ?>
        </div>
      </div>
      <div class="box-body">
        <div id="articleTable">
          <?=
          GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'options' => [
              'style' => 'word-wrap: break-word;'
            ],
            'columns' => [
              [
                'label' => 'Главное фото',
                'format' => 'raw',
                'value' => function ($model) {
                  return Html::img(Url::toRoute($model->getImage()->getPath('250x140')), [
                    'alt' => 'yii2 - картинка в gridview',
                    'style' => 'width:150px;'
                  ]);
                },
              ],
              [
                'attribute' => 'name',
                'content' => function ($model) {
                  return '<a href="' . Url::to(['update', 'id' => $model->id]) . '">' . $model->name . '</a>';
                }
              ],

              [
                'attribute' => 'visibility',
                'class' => '\kartik\grid\EditableColumn',
                'editableOptions' => [
                  'formOptions' => ['action' => ['/gallery/update-grid']],
                  'header' => 'видимость',
                  'inputType' => Editable::INPUT_CHECKBOX,
                  'options' => [
                    'class' => 'new_class',
                    'label' => 'Опубликован',
                  ],
                  'pjaxContainerId' => 'pjax-table',
                ],
                'content' => function ($model) {
                  return $model::getListYesNo($model->visibility);
                },
                'format' => 'boolean',
                'filter' => Gallery::getListYesNo(),
                'label' => 'Опубликована',
              ],

              [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',

              ],
            ],
          ]);
          ?>
        </div>
      </div>
    </div>
  </div>
</div>