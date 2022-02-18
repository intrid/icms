<?php

namespace frontend\controllers;

use Yii;
use common\models\Page;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use frontend\component\MetaComponent;
use yii\web\HttpException;

/* 
 * Вывод статичных страниц 
 */

class PageController extends Controller
{

    public function actionView($slug)
    {
        $model = $this->findModel($slug);
        if (empty($model)) {
            throw new HttpException(404);
        }

        if ($model) {
            //set SEO
            MetaComponent::setMetaSeo(
                $this->view,
                $model->title,
                $model->description,
                $model->keywords
            );
            return $this->render('view', compact('model'));
        }
    }

    private function findModel($slug)
    {
        return Page::find()->where(['slug' => $slug, 'visibility' => 1])->one();
    }

    public function actionCode()
    {
        return $this->renderPartial('code');
    }

}
