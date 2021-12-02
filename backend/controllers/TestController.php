<?php

namespace console\controllers;

use backend\components\Parser\Processor;
use Yii;
use yii\console\Controller;
use common\models\sphinx\InlineGood;
use common\models\sphinx\query\InlineGoodQuery;


class TestController extends Controller {

    public function actionTestSaveFile() 
    {
        if ( file_exists( $this->pathToFile() ) ) {
            $row = $this->getParser();
        }
    }

    public function actionGoods() 
    {
        $InlineGood = InlineGood::find()->rangeProperty( 'good_flow' );

        var_dump( $InlineGood );

    }


    protected function getParser() 
    {
        return simplexml_load_file( $this->pathToFile() );
    }

    private function pathToFile() 
    {
        return Yii::getAlias('@app/../files/1с/Test.xml');
    }

    private function pathToFileImg() 
    {
        return Yii::getAlias('@app/../files/1с/jpg/');
    }

    public function actionImport()
    {
        $a = Processor::run();
        var_dump($a);
    }

    

}
