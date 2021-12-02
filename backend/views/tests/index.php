<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TestsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Тесты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tests-index">

    <div class="row">
        <div class="col-sm-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                    <div class="box-tools pull-right" style="margin: 5px 0">
                        <?= Html::a('Добавить тест', ['create'], ['class' => 'btn btn-info']) ?>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="box-body">
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute' => 'name',
                                'value' => function($model) {
                                    return "<a href='" . yii\helpers\Url::to(['update', 'id' => $model->id]) . "'>" . $model->name . "</a>";
                                },
                                'format' => 'raw',
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{delete}'
                            ],
                        ],
                    ]);
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>