<?php

namespace console\controllers;

use common\models\Flugs;
use backend\components\Parser\Processor;
use Yii;
use yii\console\Controller;
use common\models\sphinx\InlineGood;
use common\models\sphinx\query\InlineGoodQuery;


class TestController extends Controller {

    public function actionIndex() 
    {
        echo 'This is test';
        // $flug = Flugs::find()->where(['id' => 3])->one();
        // $flug->value = (string)time();
        // $flug->save();
    }

}
