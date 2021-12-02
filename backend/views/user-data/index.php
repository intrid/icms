<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

$this->title = 'Клиенты';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
  <div class="col-sm-6">
    <div class="box">
        <div class="box-header with-border">
          <div style="float: left">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="box-tools pull-right">
            <?php if(Yii::$app->user->can('createUserdata')):?>
                <p><?php //echo Html::a('Добавить', ['create-form'], ['class' => 'btn btn-flat btn-info', 'data-userdata-create-button' => true]); ?></p>
            <?php endif;?> 
        </div>
    </div>
    <div class="box-body">
        <div id="tableUserdata">
            <?= $this->render('_table_userdata', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ])?>
        </div>
    </div>
</div>
</div>
</div>