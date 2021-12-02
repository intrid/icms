<?php

namespace backend\controllers;

use Yii;
use common\models\UserData;
use common\models\search\UserDataSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

/**
 * UserDataController implements the CRUD actions for UserData model.
 */
class UserDataController extends Controller {

    use \common\components\TraitRequest;

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

    /**
     * Lists all UserData models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new UserDataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new UserData model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $this->setAjaxRequest();

        $model = new UserData();

        if ($model->load(Yii::$app->request->post()) and $model->validate()) {

            if (empty($model->password)) {
                return [
                    'status' => false,
                    'text' => 'Задайте пароль пользователю',
                ];
            }
            if (empty($model->user_fio)) {
                return [
                    'status' => false,
                    'text' => 'Задайте ФИО пользователю',
                ];
            }
            $model->unsubscribe = Yii::$app->getSecurity()->generateRandomString(32);
            if ($model->save()) {
                $user = new \common\models\User();
                $user->username = $model->email;
                $user->email = $model->email;
                $user->setPassword($model->password);
                $user->generateAuthKey();
                $user->status = 5;
                $user->save(false);
                
                $model->user_id = $user->id;
                $model->save();
            }
            $searchModel = new UserDataSearch();
            $query = UserData::find()->where(['is_delete' => 0]);
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'sort' => false,
                'pagination' => [
                    'pageSize' => 100,
                ],
            ]);
            return [
                'textUserdata' => $this->renderAjax('_table_userdata', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]),
                'status' => true
            ];
        }
        return [
            'status' => false,
            'text' => implode($model->getFirstErrors()),
        ];
    }

    public function actionCreateForm() {
        $this->setAjaxRequest();
        return [
            'textUserdata' => $this->renderAjax('create', ['model' => new UserData(), 'modelUser' => new \common\models\User()]),
            'status' => true
        ];
    }

    /**
     * Updates an existing UserData model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $this->setAjaxRequest();

        $model = $this->findModel($id);
        $modelUser = $model->user;
        if ($model->load(Yii::$app->request->post())) {
            if ($model->getOldAttribute('email') != $model->email) {
                $model->user->username = $model->email;
                $model->user->email = $model->email;
                $model->user->save(false);
            }
            if ($model->save()) {
                if (!empty($model->password)) {
                    $model->user->password_hash = Yii::$app->security->generatePasswordHash($model->password);
                    $model->user->save(false);
                }
                $model->user->load(Yii::$app->request->post());
                $model->user->save(false);
            }
            $searchModel = new UserDataSearch();
            $query = UserData::find()->where(['is_delete' => 0]);
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'sort' => false,
                'pagination' => [
                    'pageSize' => 100,
                ],
            ]);
            return [
                'textUserdata' => $this->renderAjax('_table_userdata', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]),
                'status' => true
            ];
        }

        return [
            'status' => false,
            'text' => implode($model->getFirstErrors()),
        ];
    }

    public function actionUpdateForm($id) {
        $this->setAjaxRequest();
        $model = $this->findModel($id);
        $modelUser = $model->user;
        return [
            'textUserdata' => $this->renderAjax('update', ['model' => $model, 'modelUser' => $modelUser]),
            'status' => true
        ];
    }

    /**
     * Deletes an existing UserData model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionDelete($id)
    // {
    //     Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    //     $model = $this->findModel($id);
    //     $model->is_delete = 1;
    //     if ($model->save()) {
    //         $query = UserData::find()->where(['is_delete' => 0]);
    //         $dataProvider = new ActiveDataProvider([
    //             'query' => $query,
    //             'sort' => false,
    //             'pagination' => [
    //                 'pageSize' => 100,
    //             ],
    //         ]);
    //         return [
    //             'textUserdata' => $this->renderAjax('index', [
    //                 'searchModel' => $searchModel,
    //                 'dataProvider' => $dataProvider,
    //             ]),
    //             'status' => true
    //         ];
    //     }
    //     return [
    //         'status' => false
    //     ];
    // }

    /**
     * Finds the UserData model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserData the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = UserData::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрашиваемая страница не найдена');
    }

    public function actions() {
        return \yii\helpers\ArrayHelper::merge(parent::actions(), [
                    'update-grid' => [// identifier for your editable action
                        'class' => \kartik\grid\EditableColumnAction::className(), // action class name
                        'modelClass' => UserData::className(), // the update model class
                        'outputValue' => function ($model, $attribute, $key, $index) {
                            if ($attribute == 'type_user') {
                                return $model::getTypeUser($model->$attribute);
                            }
                        },
                    ]
        ]);
    }

}
