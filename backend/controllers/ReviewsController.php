<?php

namespace backend\controllers;

use common\models\goods\Good;
use common\models\Reviews;
use Yii;
use common\models\Review;
use common\models\search\ReviewsSearch;
use kartik\grid\EditableColumnAction;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReviewController implements the CRUD actions for Review model.
 */
class ReviewsController extends Controller
{
    /**
     * {@inheritdoc}
     */
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

    /**
     * Lists all Review models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReviewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Review model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Review model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reviews();

        $model->is_delete = 0;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Review model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->created_at !== NULL) {
            $model->created_at_str = date("d.m.Y h:i", $model->created_at);
        }

        if ($model->load(Yii::$app->request->post())) {


            $model->created_at = strtotime($model->created_at_str) ? strtotime($model->created_at_str) : NULL;

            if (!empty($good)) {
                $model->good_id = $good->id;
            }

            if ($model->save()) {

                return $this->refresh();
            } else {
                echo '<pre>';
                var_dump($model->getErrors());
                echo '</pre>';
                exit;
            }

            return $this->refresh();
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Review model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Review model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Review the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reviews::findOne($id)) !== null) {
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
        $review = Reviews::find()->where(['id' => $get['id_model']])->limit(1)->one();

        foreach ($review->getImages() as $image) {
            if ($image->id == $get['id_img']) {
                $review->removeImage($image);
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
                'modelClass' => Reviews::className(), // the update model class
                'outputValue' => function ($model, $attribute, $key, $index) {
                    switch ($attribute) {
                        case 'is_published':
                            $result = $model::getListYesNo($model->$attribute);
                            break;
                    }
                    return $result;
                },
            ]
        ]);
    }
}
