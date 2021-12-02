<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">
    <div class="row">
        <div class="col-sm-6">
            <?php Pjax::begin(); ?>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Управление пользователями</h3>
                    <div class="pull-right box-tools">
                        <?php if (Yii::$app->user->can('createUsers')) : ?>
                            <p><?php echo Html::a('Добавить', ['create'], ['class' => 'btn btn-flat btn-info']) ?></p>
                        <?php endif; ?>
                    </div>
                    <?php if (Yii::$app->user->id == 1) : ?>
                        <div class="callout">
                            <b>* Пользователя Админ Inrid запрещено редактировать и удалять. </b><br>
                            <span>Он виден только если под ним авторизоваться</span>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="box-body">
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        //                'rowOptions' => function ($model, $key, $index, $grid) {
                        //                    return [
                        //                        'data-href' => "/icms/users/update?id=" . $key,
                        //                    ];
                        //                },
                        'columns' => [


                            //                            'name',

                            //
                            //                        [
                            //                            'attribute' => 'username',
                            //
                            //                        ],

                            [
                                'label' => 'Имя пользователя',
                                'content' => function ($model) {
                                    if ($model->username == "superuser") {
                                        return;
                                    } else {
                                        return '<a href="' . Url::to(['update', 'id' => $model->id]) . '">' . $model->username . '</a>';
                                    }
                                }
                            ],


                            [
                                'label' => 'Email',
                                'content' => function ($model) {
                                    if ($model->username == "superuser") {
                                        return;
                                    } else {
                                        return '<a href="' . Url::to(['update', 'id' => $model->id]) . '">' . $model->email . '</a>';
                                    }
                                }
                            ],

                            [
                                'class' => \yii\grid\ActionColumn::class,
                                'template' => '{delete}',
                                'visibleButtons' => [
                                    'delete' => true,
                                ],
                                'buttons' => [
                                    'delete' => function ($url, $model) {
                                        $url = Url::to(['delete', 'id' => $model->id]);
                                        if ($model->username == "superuser") {
                                            return;
                                        } else {
                                            return Html::a(
                                                'Удалить',
                                                $url,
                                                [
                                                    'title' => 'Удалить администратора',
                                                ]
                                            );
                                        }
                                    },

                                ],
                            ],

                            // [
                            //     'class' => 'yii\grid\ActionColumn',
                            //     'template' => ' {delete}',
                            //     'visibleButtons' => ['delete' => Yii::$app->user->can('deleteArticles'),]
                            // ],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>
</div>
</div>