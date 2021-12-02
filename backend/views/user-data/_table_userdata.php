<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use common\models\UserData;
?>

<?=

GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'options' => [
        'style' => 'word-wrap: break-word;'
    ],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        [
            'attribute' => 'user_fio',
            // 'content' => function ($model) {
            //     if (Yii::$app->user->can('updateUserdata')) {
            //         return '<a href="' . Url::to(['update-form', 'id' => $model->id]) . '" data-modal-update="' . $model->id . '" data-userdata-update-button=true">' . $model->user_fio . '</a>';
            //     }
            // }
        ],
        'phone',
        'email:email',
        'address',

        [
            'label' => 'Заказы',
            'attribute' => 'user_fio',
            'content' => function ($model) {
                return '<a href="' . Url::to(['/order',
                        "OrderSearch[email]" => $model->user->email]) . '">К заказам</a>';
            }
        ],
    ],
]);
?>