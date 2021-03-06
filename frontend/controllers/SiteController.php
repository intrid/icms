<?php

namespace frontend\controllers;

use common\models\Article;
use common\models\Category;
use common\models\goods\Good;
use common\models\Slider;


class SiteController extends AppController
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $slides = Slider::find()->where(['visibility' => 1])->all();

        return $this->render('index', compact('slides'));
    }

    public function actionLogin()
    {
        return $this->redirect(['/site/index']);
    }

    public function actionAgreement()
    {
        return $this->renderPartial('agreement');
    }

    /**
     * Политика конфиденциальности
     */
    public function actionPolytic()
    {
        return $this->renderPartial('polytic');
    }
}
