<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use common\components\MyComponent;
use common\models\Reviews;
use kartik\editable\Editable;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ReviewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-index">
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <div style="float: left">
                        <h3 class="box-title"><?= Html::encode($this->title); ?></h3>
                    </div>
                     <div class="pull-right">
                        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-flat btn-info']); ?>
                    </div> 
                </div>

                <div class="box-body">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute' => 'name',
                                'content' => function ($model) {
                                    return '<a href="' . Url::to(['update', 'id' => $model->id]) . '">' . $model->name . '</a>';
                                }
                            ],
                            [
                                'attribute' => 'created_at',
                                'format' => ['date', 'php:d.m.Y'],
                            ],

                            [
                                'attribute' => 'is_published',
                                'class' => '\kartik\grid\EditableColumn',
                                'editableOptions' => [
                                    'formOptions' => ['action' => ['/reviews/update-grid']],
                                    'header' => 'видимость',
                                    'inputType' => Editable::INPUT_CHECKBOX,
                                    'options' => [
                                        'class' => 'new_class',
                                        'label' => 'Опубликован',
                                    ],
                                    'pjaxContainerId' => 'pjax-table',
                                ],
                                'content' => function ($model) {
                                    return $model::getListYesNo($model->is_published);
                                },
                                'format' => 'boolean',
                                'filter' => Reviews::getListYesNo(),
                                'label' => 'Опубликован',
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