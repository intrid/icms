<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Review */

$this->title = 'Создание отзыва';
$entity = "Отзыв";
$this->params['breadcrumbs'][] = ['label' => 'Отзывы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-create">
    <div class="row">
        <div class="col-lg-10">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" >
                        <div style="float:left;" >
                            <?= $entity; ?>
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
