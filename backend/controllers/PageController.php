<?php

namespace backend\controllers;

use rico\yii2images\behaviors\ImageBehave;
use rico\yii2images\models\Image;
use Yii;
use common\models\Page;
use common\models\search\PageSearch;
use kartik\grid\EditableColumnAction;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

class PageController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Page model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Page();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        return $this->render('create', ['model' => $model]);
    }

    /**
     * Updates an existing Page model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = Page::getModelById($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        return $this->render('update', ['model' => $model]);
    }

    /**
     * Deletes an existing Page model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = Page::getModelById($id);
        $model->is_delete = 1;
        $model->save();
        return $this->redirect(['index']);
    }


    public function actionImageDelete($name)
    {
        $params = Yii::$app->request->queryParams;
        ImageBehave:: getImageByName($name);

        var_dump($params);die;
    }

    public function actions()
    {
        return \yii\helpers\ArrayHelper::merge(parent::actions(), [
            'update-grid' => [ // identifier for your editable action
                'class' => EditableColumnAction::className(), // action class name
                'modelClass' => Page::className(), // the update model class
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
