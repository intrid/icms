<?php

use yii\helpers\Html;
use common\models\goods\Good;
/* @var $this yii\web\View */
/* @var $model common\models\Review */

$this->title = 'Редактирование:';
$this->params['breadcrumbs'][] = ['label' => 'Отзывы', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование отзыва к товару ';
?>
<div class="review-update">
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" >
                        <div style="float:left;" >
                            Редактирование отзыва: 
                        </div>
                    </h3>
                </div>
                
                <div class="box-body">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
