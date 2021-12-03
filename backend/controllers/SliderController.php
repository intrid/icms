<?php

namespace backend\controllers;

use Yii;
use common\models\Slider;
use common\models\search\SliderSearch;
use kartik\grid\EditableColumnAction;
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
            $prev_tablet = \yii\web\UploadedFile::getInstance($model, 'prev_tablet');
            $prev_mobile = \yii\web\UploadedFile::getInstance($model, 'prev_mobile');

            if ($model->save()) {

                $model->prev = $prev;
                if (!empty($model->prev)) {
                    $model->uploadImgPrev();
                }

                $model->prev_tablet = $prev_tablet;
                if (!empty($model->prev_tablet)) {
                    $model->uploadImgPrevTablet();
                }

                $model->prev_mobile = $prev_mobile;
                if (!empty($model->prev_mobile)) {
                    $model->uploadImgPrevMobile();
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
            $prev_tablet = \yii\web\UploadedFile::getInstance($model, 'prev_tablet');
            $prev_mobile = \yii\web\UploadedFile::getInstance($model, 'prev_mobile');

            if ($model->save()) {

                $model->prev = $prev;
                if (!empty($model->prev)) {
                    $model->uploadImgPrev();
                }

                $model->prev_tablet = $prev_tablet;
                if (!empty($model->prev_tablet)) {
                    $model->uploadImgPrevTablet();
                }

                $model->prev_mobile = $prev_mobile;
                if (!empty($model->prev_mobile)) {
                    $model->uploadImgPrevMobile();
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


    /**
     * Удаление изображения
     */
    public function actionImageDelete()
    {
        $get = Yii::$app->request->get();
        $model = Slider::find()->where(['id' => $get['id_model']])->limit(1)->one();

        foreach ($model->getImages() as $image) {
            if ($image->id == $get['id_img']) {
                $model->removeImage($image);
                break;
            }
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actions()
    {
        return \yii\helpers\ArrayHelper::merge(parent::actions(), [
            'update-grid' => [ // identifier for your editable action
                'class' => EditableColumnAction::className(), // action class name
                'modelClass' => Slider::className(), // the update model class
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
