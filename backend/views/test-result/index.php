<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\TestResult;
use common\models\Tests;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TestResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Результаты тестирования';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-result-index">

    <div class="row">
        <div class="col-sm-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                </div>
                <div class="box-body">
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute' => 'id_shop',
                                'value' => function($model) {
                                    if (!empty($model->shop)) {
                                        $name = $model->shop->name;
                                        return "<a href='" . yii\helpers\Url::to(['/shops', 'ShopsSearch' => ['name' => $name]]) . "'>" . $name . "</a>";
                                    } else {
                                        return 'магазин не найден';
                                    }
                                },
                                'format' => 'raw',
                            ],
                            'name',
                            [
                                'attribute' => 'id_test',
                                'value' => function($model) {
                                    if (!empty($model->test)) {

                                        return "<a href='" . yii\helpers\Url::to(['/tests/update', 'id' => $model->id_test]) . "'>" . $model->test->name . "</a>";
                                    } else {
                                        return 'тест не найден';
                                    }
                                },
                                'format' => 'raw',
                            ],
                            [
                                'attribute' => 'result',
                                'value' => function($model) {
                                    return $model->result . "%";
                                }
                            ],
                            [
                                'attribute' => 'procent',
                                'value' => function($model) {
                                    return $model->procent . "%";
                                }
                            ],
                            'date:date',
                        ],
                    ]);
                    ?>
                </div>
            </div>

        </div>
    </div>

</div>
