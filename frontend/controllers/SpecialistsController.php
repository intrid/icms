<?php

namespace frontend\controllers;

use common\models\Gallery;
use Yii;
use common\models\Specialists;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use frontend\component\MetaComponent;
use yii\web\HttpException;

class SpecialistsController extends Controller
{

    public function actionIndex()
    {

        $photos = Gallery::find(['visibility' => 1])->orderBy('id DESC')->all();
        $specialists = Specialists::find(['visibility' => 1])->all();

        return $this->render('index', compact('specialists', 'photos'));
    }

}
