<?php

namespace backend\controllers;

use Yii;
use common\models\Gallery;
use common\models\search\GallerySearch;
use kartik\grid\EditableColumnAction;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class GalleryController extends Controller
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
        $searchModel = new GallerySearch();
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
        $model = new Gallery();

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
        if (($model = Gallery::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actions()
    {
        return \yii\helpers\ArrayHelper::merge(parent::actions(), [
            'update-grid' => [ // identifier for your editable action
                'class' => EditableColumnAction::className(), // action class name
                'modelClass' => Gallery::className(), // the update model class
                'outputValue' => function ($model, $attribute, $key, $index) {
                    switch ($attribute) {
                        case 'visibility':
                            $result = $model::getListYesNo($model->$attribute);
                            break;
                    }
                    return $result;
                },
            ]
        ]);
    }
}
