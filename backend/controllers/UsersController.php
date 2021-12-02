<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use common\models\search\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller {

    const CONST_PERMISION = [
        'view',
        'create',
        'update',
        'delete'
    ];
    const CONST_TABLE = [
        'category',
        'catalog',
        // 'goods',
        'reviews',
        'page',
        'articles',
        'video',
        'slider',
        'settings',
        'seo',
        'users',
        'userdata',
        'stock',
    ];
    const CONST_TABLE_NAME = [
        'Категории',
        'Продукция',
        'Отзывы',
        'Страницы',
        'Новости',
        'Видео',
        'Слайдер',
        'Настройки',
        'SEO',
        'Администраторы',
        'Пользователи',
        'Акции',
    ];

    public function behaviors() {
        return [
            // 'access' => [
            //     'class' => AccessControl::className(),
            //     'rules' => [
            //         [
            //             'allow' => true,
            //             'actions' => ['index'],
            //             'roles' => ['viewUsers'],
            //         ],
            //         [
            //             'allow' => true,
            //             'actions' => ['view'],
            //             'roles' => ['viewUsers'],
            //         ],
            //         [
            //             'allow' => true,
            //             'actions' => ['update'],
            //             'roles' => ['updateUsers'],
            //         ],
            //         [
            //             'allow' => true,
            //             'actions' => ['create'],
            //             'roles' => ['createUsers'],
            //         ],
            //         [
            //             'allow' => true,
            //             'actions' => ['delete'],
            //             'roles' => ['deleteUsers'],
            //         ],
            //         [
            //             'actions' => ['login', 'error'],
            //             'allow' => true,
            //         ],
            //     ],
            // ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['GET'],
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new User();
        $post = Yii::$app->request->post();
        if ($model->load($post)) {
            $model_password_to = !empty($post['User']['password_hash']) ? $post['User']['password_hash'] : '';
            $model->password_hash = !empty($post['User']['password_hash']) ? Yii::$app->getSecurity()->generatePasswordHash($post['User']['password_hash']) : "";
            $model->username = $post['User']['username'];
            $model->name = $post['User']['username'];
            $model->email = $post['User']['email'];
            $model->auth_key = Yii::$app->security->generateRandomString();
            $model->status = 10;
            if ($model->save()) {
                $post_user = isset($post['Users']['permision']) ? $post['Users']['permision'] : [];
                $this->setRoleUsers($post_user, $model->id);
                return $this->redirect(['index']);
            } else {
                $model->password_hash = $model_password_to;
                print_r($model->getErrors());
                die;
            }
        }

        return $this->render('create', [
                    'model' => $model,
                    'table' => self::CONST_TABLE,
                    'tableName' => self::CONST_TABLE_NAME,
        ]);
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $password_hash = $model->password_hash;
        //var_dump($model->password_hash); 
        $model->password_hash = '';
        //$model->permision = $this->getListPermisionUsers($id);
        $post = Yii::$app->request->post();
        if ($model->load($post)) {
            $model->password_hash = !empty($post['User']['password_hash']) ? Yii::$app->getSecurity()->generatePasswordHash($post['User']['password_hash']) : $password_hash;
            //var_dump($model->password_hash); 
            $model->username = $post['User']['username'];
            $model->name = $post['User']['username'];
            $model->email = $post['User']['email'];

            //var_dump($model); die;

            if ($model->save()) {
                //$post_user = isset($post['Users']['permision']) ? $post['Users']['permision'] : [];
                //$this->setRoleUsers($post_user, $id);

                return $this->redirect(['update', 'id'=>$id]);
            }
        }

        return $this->render('update', [
                    'model' => $model,
                    'table' => self::CONST_TABLE,
                    'tableName' => self::CONST_TABLE_NAME,
        ]);
    }

    /**
     * Deletes an existing Users model.
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
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрашиваемая страница не существует');
    }

    private function getListPermisionUsers($id) {
        $permision_const = self::CONST_PERMISION;
        $table = self::CONST_TABLE;
        $users['permision'] = [];
        for ($i = 0; $i < count($permision_const); $i++) {
            for ($j = 0; $j < count($table); $j++) {
                $users['permision'][$permision_const[$i]][$table[$j]] = Yii::$app->authManager->checkAccess($id, $permision_const[$i] . ucfirst($table[$j]));
            }
        }
        return $users;
    }

    private function setRoleUsers($permision, $id) {

        $permision_const = self::CONST_PERMISION;
        $table = self::CONST_TABLE;
        for ($i = 0; $i < count($permision_const); $i++) {
            for ($j = 0; $j < count($table); $j++) {
                if (isset($permision[$permision_const[$i]][$table[$j]])) {
                    $table_per = Yii::$app->authManager->checkAccess($id, $permision_const[$i] . ucfirst($table[$j]));
                    $user_per = (bool) $permision[$permision_const[$i]][$table[$j]];
                    if ($table_per != $user_per) {
                        $role = Yii::$app->authManager->getRole($permision_const[$i] . ucfirst($table[$j]));
                        Yii::$app->authManager->assign($role, $id);
                    }
                } else {
                    if (Yii::$app->authManager->checkAccess($id, $permision_const[$i] . ucfirst($table[$j])) == true) {
                        $role = Yii::$app->authManager->getRole($permision_const[$i] . ucfirst($table[$j]));
                        Yii::$app->authManager->revoke($role, $id);
                    }
                }
            }
        }
    }

}
