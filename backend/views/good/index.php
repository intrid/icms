<?php

use common\components\MyComponent;
use common\models\goods\Good;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\widgets\Alert;

use common\models\Brands;
use common\models\Category;
use common\models\Sports;
use common\models\goods\GoodTypes;

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
                <div id="brandTable">
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'options' => [
                            'style' => 'word-wrap: break-word;'
                        ],
                        'columns' => [

                            [
                                'label' => 'Картинка',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return Html::img(Url::toRoute($model->getImage()->getPath()), [
                                        'alt' => 'yii2 - картинка в gridview',
                                        'style' => 'width:150px;'
                                    ]);
                                },
                            ],

                            [
                                'attribute' => 'name_t',
                                'content' => function ($model) {
                                    return '<a  target="_blank" href="' . Url::to(['../goods/' . $model->slug]) . '">' . $model->name_t . '</a>';
                                }
                            ],

                            [
                                'attribute' => 'code_t',
                                'content' => function ($model) {
                                    return $model->code_t;
                                }
                            ],

                            // [
                            //     'attribute' => 'category_id',
                            //     'label' => 'Категория',
                            //     'value' => function ($model) {
                            //         return $model->category->name;
                            //     },
                            //     'filter' => Category::dropDown()
                            // ],

                            // [
                            //     'attribute' => 'discount_price',

                            //     'filter' => Good::dropDown('discount_price', 'discount_price')
                            // ],

                            [
                                'attribute' => 'visibility',

                                'filter' => MyComponent::getYesNo(),
                                'value' => function ($model) {
                                    return MyComponent::getYesNoName($model->visibility);
                                }
                            ],

                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{update}',
                            ],



                            //                            [
                            //                                'attribute' => 'description',
                            //                                'label' => 'Описание',
                            //
                            //
                            //                                'filter' => MyComponent::getYesNo(),
                            //                                'value' => function ($model) {
                            //                                    return MyComponent::getYesNoNameString($model->description);
                            //                                }
                            //                            ],

                            //                            [
                            //                                'attribute' => 'description',
                            //                                'label' => 'Видео',
                            //
                            ////                                'value' => function ($model) {
                            ////                                    return $model->is_published?"Да":"Нет";
                            ////                                },
                            ////                                'filter' => Good::dropDown('is_published')
                            //
                            //
                            //                                'filter' => MyComponent::getYesNo(),
                            //                                'value' => function ($model) {
                            //                                        return MyComponent::getYesNoNameString($model->video_link);
                            //                                }
                            //                            ],
                            //
                            //                            [
                            //                                'attribute' => 'description',
                            //                                'label' => 'Отзывы',
                            //
                            ////                                'value' => function ($model) {
                            ////                                    return $model->is_published?"Да":"Нет";
                            ////                                },
                            ////                                'filter' => Good::dropDown('is_published')
                            //
                            //
                            //                                'filter' => MyComponent::getYesNo(),
                            //                                'value' => function ($model) {
                            //                                        return MyComponent::getYesNoNameString($model->review);
                            //                                }
                            //                            ],



                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>