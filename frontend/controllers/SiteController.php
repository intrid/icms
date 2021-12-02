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
        
        // $cats = Category::find()->all();
        // foreach ($cats as $cat) {
        //     echo "-" . $cat->name;
        //     echo "<br>";
        //     $parents = $cat->parents;

        //     if (!empty($parents)) {

        //         foreach ($parents as $parent) {
        //             echo "- - -" . $parent->name;
        //             echo "<br>";

        //             $parentsTwo = $parent->parents;
        //             if (!empty($parentsTwo)) {
        //                 foreach ($parentsTwo as $parentTwo) {
        //                     echo "- - - - - -" . $parentTwo->name;
        //                     echo "<br>";
        //                 }
        //             }
        //         }
        //     }
        // }
        // die;

        $goods = Good::find()->where(['visibility' => 1,'view_main' => 1])->all();

        $slides = Slider::find()->where(['visibility' => 1])->all();
        $articles = Article::find()->where(['is_delete' => 0, 'visibility' => 1])->orderBy('date DESC')->limit(5)->all();

        return $this->render('index', compact('articles', 'slides', 'goods'));
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
