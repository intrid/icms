<?php

namespace backend\controllers;

use common\components\Seo\Seo;
use common\components\Seo\SeoBehavior;
use common\models\Gallery;
use Yii;
use common\models\search\GallerySearch;
use kartik\grid\EditableColumnAction;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;


class GalleryController extends Controller
{

    use \common\components\TraitRequest;

    public $max_width = 1200;
    public $max_height = 750;


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            SeoBehavior::class,
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
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

    /**
     * Creates a new Gallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        set_time_limit(180);

        $model = new Gallery();

        if ($model->load(Yii::$app->request->post())) {

            $model->slug = Gallery::generateSlug($model->name);

            $prev = \yii\web\UploadedFile::getInstance($model, 'prev');
            $images = \yii\web\UploadedFile::getInstances($model, 'images');

            if ($model->save()) {

                $model->prev = $prev;
                if (!empty($model->prev)) {
                    $model->uploadImgPrev();
                }

                $model->images = $images;
                if (!empty($model->images)) {
                    $model->uploadImg();
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

    /**
     * Updates an existing Gallery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        set_time_limit(180);

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->slug = Gallery::generateSlug($model->name);

            $prev = \yii\web\UploadedFile::getInstance($model, 'prev');
            $images = \yii\web\UploadedFile::getInstances($model, 'images');


            if ($model->save()) {

                $model->prev = $prev;
                if (!empty($model->prev)) {
                    $model->uploadImgPrev();
                }

                $model->images = $images;
                if (!empty($model->images)) {
                    $model->uploadImg();
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

    /**
     * Deletes an existing Gallery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $model->removeImages();
        $model->delete();

        Yii::$app->session->setFlash('success', 'Галерея удалена');

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Gallery::findOne($id)) !== null) {
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
        $gallery = Gallery::find()->where(['id' => $get['id_model']])->limit(1)->one();

        foreach ($gallery->getImages() as $image) {
            if ($image->id == $get['id_img']) {
                $gallery->removeImage($image);
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
