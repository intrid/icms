<?php

namespace frontend\modules\user\controllers;

use Yii;
use yii\web\Controller;
use frontend\modules\user\models\LoginForm;
use frontend\modules\user\models\PasswordResetRequestForm;
use frontend\modules\user\models\ResetPasswordForm;
use frontend\modules\user\models\SignupForm;
use frontend\modules\user\components\AuthHandler;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use frontend\models\User;
use frontend\modules\user\models\UpdateUserForm;
use frontend\modules\user\models\ChangePasswordForm;
use yii\web\HttpException;

/**
 * Default controller for the `user` module
 */
class DefaultController extends \frontend\controllers\AppController
{

    use \common\components\TraitRequest;

    public $footer_polytic = 'Нажимая кнопку, Вы даете свое согласие на <a href="/files/polytic.pdf" target="_blank">обработку персональных данных</a>';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup', 'change-password'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'change-password'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['GET'],
                    'change-password' => ['POST'],
                ],
            ],
        ];
    }

    public function onAuthSuccess($client)
    {
        (new AuthHandler($client))->handle();
    }

    public function actions()
    {
        return [
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'onAuthSuccess'],
            ],
        ];
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {

        $post = $this->setAjaxRequest();
        $response = ['status' => false];

        $model = new LoginForm();

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if ($model->load($post) && $model->login()) {

            $response['status'] = true;
            //$response['htmlContent'] = $this->renderPartial('@app/views/lk/index');
            return Yii::$app->response->redirect(['/lk/index']);
        } else {
            $model->password = '';
            $response['status'] = false;
            $response['errors'] = $model->getErrors();
        }

        return $response;
    }

    public function actionResetPassword()
    {
        $token = Yii::$app->request->get('token');

        $user = User::findOne(['password_reset_token' => $token]);
        $changePasswordForm = new ChangePasswordForm();

        if(Yii::$app->request->post()) {
            $post = Yii::$app->request->post();
            $user = User::findOne(['password_reset_token' => $post['ChangePasswordForm']['reset_hash']]);
            $user->setPassword($post['ChangePasswordForm']['password']);
            $user->removePasswordResetToken();
            $user->save();
            return $this->redirect(['/']);
        }

        if (!empty($user)) {
            return $this->render('_changePassword', ['changePasswordForm' => $changePasswordForm]);
        } else {
            throw new HttpException(404);
        }
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        $post = Yii::$app->request->post();

        if ($model->load($post)) {
            if ($user = $model->signup($post['SignupForm'])) {
                //if ( $model->sendEmail() ) {}
                $model->sendEmail();
                if (Yii::$app->getUser()->login($user)) {
                    return $this->redirect(['/lk/index']);
                }

            } else {
                $data['status'] = false;
                $data['errors'] = $model->getErrors();
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

                return $data;
            }
        } else {
            $data['status'] = false;
            $data['errors'] = $model->getErrors();
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            return $data;
        }
    }

    public function actionSignupLk()
    {
        $model = new UpdateUserForm();
        $model->scenario = UpdateUserForm::SCENARIO_REGISTER_3;
        $post = Yii::$app->request->post();
        $model->load($post);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'status' => $model->saveLk($model),
        ];
    }

    public function actionSignupLkP()
    {
        $model = new UpdateUserForm();
        $model->scenario = UpdateUserForm::SCENARIO_REGISTER_4;
        $model->load(Yii::$app->request->post());
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'status' => $model->saveLkP($model),
        ];
    }

    public function actionSignupLkOpt()
    {
        $model = new UpdateUserForm();
        $model->scenario = UpdateUserForm::SCENARIO_REGISTER_2;
        $model->load(Yii::$app->request->post());
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'status' => $model->saveLkOpt($model),
        ];
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        $cokies = Yii::$app->request->cookies;
        if ($cokies->has('hash')) {
            $cokies = Yii::$app->response->cookies;
            $cokies->remove('hash');
        }
        Yii::$app->user->logout();
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionRequestPasswordReset()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = new PasswordResetRequestForm();

        $post = Yii::$app->request->post();

        $model->load($post);

        if ($model->validate()) {
            $model->sendEmail();

            $data['status'] = true;
            $data['message'] = 'Проверьте электронную почту для получения дальнейших инструкций';
            return $data;
        } else {

            $errors = $model->getErrors();
            $data['status'] = false;
            $data['errors'] = $errors;
            return $data;
        }
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function NOactionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        $post = $this->setAjaxRequest();

        //var_dump($post['email']);

        $model->email = $post['email'];

        if ($model->validate()) {
            //$model->sendEmail();

            $data['response'] = 'Проверьте электронную почту для получения дальнейших инструкций.';
            //$data['status'] = true;

            return $data;
        } else {
            $errors = $model->getErrors();
            //$data['status'] = false;
            $data['response'] = $errors;

            return $data;
        }


        // if ($model->load(Yii::$app->request->post())) {

        //     if (!empty($model->email)) {

        //         if ($model->validate()) {

        //             if ($model->sendEmail()) {
        //                 $data['header'] = 'Восстановление доступа';
        //                 $data['text'] = 'Проверьте электронную почту для получения дальнейших инструкций.';
        //                 $data['footer'] = '';
        //                 $data['status'] = true;

        //                 return $data;
        //             }
        //         } else {
        //             $errors = $model->getErrors();
        //             $data['status'] = false;
        //             $data['errors'] = $errors;

        //             return $data;
        //         }
        //     }
        // }

        $data['header'] = 'Восстановление доступа';
        $data['status'] = false;
        $data['text'] = $this->renderAjax('@frontend/views/short/_recovery', ['model' => $model]);
        $data['footer'] = '';

        return $data;
    }

    public function actionChangePassword()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $res = false;
        $errors = [];

        $post = Yii::$app->request->post();
        $form = new ChangePasswordForm();
        $form->load($post);
        if ($form->validate()) {
            Yii::$app->session->setFlash('success', "Пароль изменён");
            $res = $form->changePassword();
        } else {
            $errors = $form->getErrors();
        }

        return Yii::$app->response->redirect(['/lk/index']);
        // return [
        //     'status' => $res,
        //     'errors' => $errors,
        //     'formName' => $form->formName(),
        //     'successModal' => [
        //         'title' => 'Измение параметров',
        //         'content' => 'Пароль изменён',
        //     ],
        //     'errorMessage' => ''
        // ];
    }
}
