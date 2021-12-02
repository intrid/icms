<?php

namespace backend\controllers;

use Yii;
use common\models\Slider;
use common\models\search\SliderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SliderController implements the CRUD actions for Slider model.
 */
class SliderController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $searchModel = new SliderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Slider();

        if ($model->load(Yii::$app->request->post())) {

            $prev = \yii\web\UploadedFile::getInstance($model, 'prev');
            if ($model->save()) {

                $model->prev = $prev;
                if (!empty($model->prev)) {
                    $model->uploadImgPrev();
                }

                return $this->redirect(['index']);
            } else {
                var_dump($model->getErrors());
                exit;
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $prev = \yii\web\UploadedFile::getInstance($model, 'prev');
            if ($model->save()) {

                $model->prev = $prev;
                if (!empty($model->prev)) {
                    $model->uploadImgPrev();
                }

                return $this->redirect(['index']);
            } else {
                var_dump($model->getErrors());
                exit;
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->removeImages();
        $model->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Slider::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
