<?php

namespace backend\controllers;

//use frontend\modules\user\models\LoginForm;
use rico\yii2images\behaviors\ImageBehave;
use Yii;
use yii\imagine\Image;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * {@inheritdoc}
     */
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
                        'actions' => ['logout', 'index', 'site-settings', 'change-admin-pass', 'sitemap', 'new-pass', 'stat', 'import-export', 'export'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'layout' => 'main-login',
            ],
            'index' => [
                'class' => 'backend\actions\IcmsSettingsAction',
                'modelClass' => 'backend\models\Settings',
                'viewName' => 'site-settings' // The form we need to render
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */

    public function actionIndex() 
    {
        
    }



    public function actionChangeAdminPass() {
        $change_pass_form = new \backend\models\ChangePasswordForm();

        if ($change_pass_form->load(Yii::$app->request->post()) && $change_pass_form->validate()) {
            $change_pass_form->save();
            Yii::$app->session->setFlash('info', 'Пароль изменен');
            $this->redirect(['index']);
        }
    }

    public function actionNewPass(){
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->assetManager->bundles = [
            'yii\web\YiiAsset' => false,
            'yii\bootstrap\BootstrapPluginAsset' => false,
            'yii\bootstrap\BootstrapAsset' => false,
            'yii\web\JqueryAsset' => false
        ];
        return [
            'textPassword' => $this->renderAjax('_pass'),
            'status' => true,
        ];
    }

    /**
     * Login action.
     *
     * @return string
     */

    public function actionLogin() {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'main-login';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    public function actionSitemap() 
    {
        Yii::$app->sitemapGenerator->myGenerateSitemapVrn();
        
        Yii::$app->session->setFlash('success', 'Sitemap сгенерирован и опубликован');

        return $this->redirect(['index']);
    }
}
