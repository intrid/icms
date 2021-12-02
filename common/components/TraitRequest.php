<?php

namespace common\components;

use Yii;

//use ;

trait TraitRequest {

    public function setAjaxRequest($flag = true, $type = 'post'):array {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if ($flag) {
            Yii::$app->assetManager->bundles = [
                'yii\web\YiiAsset' => false,
            ];
        }
        Yii::$app->assetManager->bundles = [
            'yii\bootstrap\BootstrapPluginAsset' => false,
            'yii\bootstrap\BootstrapAsset' => false,
            'yii\web\JqueryAsset' => false
        ];
        return Yii::$app->request->$type();
    }

    public function setCcoockiesTypeInedx() {
        $get = Yii::$app->request->get();
        if (isset($get['typeIndex'])) {
            $coockies = Yii::$app->request->cookies;
            if ($coockies->has('typeIndex')) {
                $value = $coockies->get('typeIndex')->value;

                if ($value != $get['typeIndex']) {
                    $coockiesR = Yii::$app->response->cookies;
                    $coockiesR->add(new \yii\web\Cookie(['name' => 'typeIndex', 'value' => $get['typeIndex']]));
                }
                $value =$get['typeIndex'];
            } else {
                $coockiesR = Yii::$app->response->cookies;
                $coockiesR->add(new \yii\web\Cookie(['name' => 'typeIndex', 'value' => 'block']));
                $value = 'block';
            }
        } else {
            $coockies = Yii::$app->request->cookies;
            if ($coockies->has('typeIndex')) {
                $value = $coockies->get('typeIndex')->value;
            } else {
                $coockiesR = Yii::$app->response->cookies;
                $coockiesR->add(new \yii\web\Cookie(['name' => 'typeIndex', 'value' => 'block']));
                $value = 'block';
            }
        }
        return $value;
    }

}
