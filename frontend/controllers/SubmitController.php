<?php

namespace frontend\controllers;

use common\components\MyHelper;
use Yii;
use yii\filters\VerbFilter;
use common\models\City;
use frontend\models\CommentForm;
use yii\httpclient\Client;
use frontend\modules\user\models\PasswordResetRequestForm;
use frontend\modules\user\models\LoginForm;
use frontend\modules\user\models\SignupForm;
use frontend\models\FeedBackForm;
use frontend\models\ContactForm;

use yii\web\Response;
use yii\helpers\Url;
use yii\helpers\Html;

class SubmitController extends AppController
{

    use \common\components\TraitRequest;

    public $footer_polytic = 'Нажимая кнопку, Вы даете свое согласие на <a href="/polytic" target="_blank">обработку персональных данных</a>';

    public function actionLogout()
    {
        $cokies = Yii::$app->request->cookies;
        if ($cokies->has('hash')) {
            $cokies = Yii::$app->response->cookies;
            $cokies->remove('hash');
        }
        Yii::$app->user->logout();
        return $this->redirect(['site/index']);
    }

    private function reGoogle($p)
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl('https://www.google.com/recaptcha/api/siteverify')
            ->setData([
                'secret' => '6Lfcx7UUAAAAALGmpKJwDSCsF0mW7KJRN7YMHFka',
                'response' => $p,
                'remoteip' => Yii::$app->request->userIP,
            ])
            ->send();
        $status = json_decode($response->content);
        return $status;
    }

    public function actionComment()
    {
        $this->setAjaxRequest();
        $post = Yii::$app->request->post();
        $model = new CommentForm();
        $model->load($post);
        if ($model->saveFrom()) {
            return [
                'title' => 'Спасибо за отзыв!',
                'text' => '',
            ];
        }
        return [
            'title' => 'Произошла ошибка',
            'text' => ''
        ];
    }

   

    public function actionSetCity()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $response = [];
        $cityId = Yii::$app->request->post()['cityId'];
        $city = City::findOne($cityId);
        Yii::$app->city->add($city);

        $response['status'] = true;
        $response['cityId'] = $cityId;

        return $response;
    }

    public function actionOrder()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $get = Yii::$app->request->get();

        $response['status'] = false;
        $response['message'] = "Извините, возникла непридвиденная ошибка";

        if (isset($get['phone']) && !empty($get['phone'])) {

            $settings = Yii::$app->settings;

            $message = '<p><h2><b>Новая заявка на запись</b></h2></p>';
            $message .= "<p><b>Имя</b>: " . Html::encode($get['name']) . "</p>";
            $message .= "<p><b>Телефон</b>: " . Html::encode($get['phone']) . "</p>";
            $message .= "<p><b>Дата</b>: " . (!empty($get['date']) ? Html::encode($get['date']) : "Не выбрано")  . "</p>";

            $res = Yii::$app->mailer->compose()
                ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name . ' robot'])
                ->setTo(trim($settings->get('Settings.email')))
                ->setSubject('Заявка на запись')
                ->setHtmlBody($message)
                ->send();

            $response['status'] = true;
            $response['message'] = "Заявка создана. Ожидайте, с Вами свяжутся в ближайшее время";
        }

        return $response;
    }
}
