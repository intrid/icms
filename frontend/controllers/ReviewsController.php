<?php

namespace frontend\controllers;

use Yii;
use common\models\Reviews;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use frontend\component\MetaComponent;
use yii\data\Pagination;
use yii\web\HttpException;

class ReviewsController extends Controller
{

    public function actionIndex()
    {
        $query = Reviews::find(['visibility' => 1, 'is_delete' => 0]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6]);
        $reviews = $query->offset($pages->offset)
            ->limit(6)
            ->orderBy('created_at DESC')
            ->all();

        return $this->render('index', compact('reviews', 'pages'));
    }

}
