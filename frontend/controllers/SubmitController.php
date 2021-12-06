<?php

namespace frontend\controllers;

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

class SubmitController extends AppController{

    use \common\components\TraitRequest;

    public $footer_polytic = 'Нажимая кнопку, Вы даете свое согласие на <a href="/polytic" target="_blank">обработку персональных данных</a>';


    public function actionModal() 
    {
        //Скорее всего зашёл робот или сканер, нужно ему что-нибудь отдать
        if ( Yii::$app->request->isGet ) {
            $response = Yii::$app->response;
            $response->setStatusCode( 200 );

            return $response;
        }

        $post = $this->setAjaxRequest();

        $modal = substr( $post['modal'], 1 );
        $data = [];

        switch ( $modal ) {
            case 'auth':
                $model = new LoginForm();
                $data['status'] = true;
                $data['header'] = "Авторизация";
                $data['text'] = $this->renderAjax('/short/_aout', ['model' => $model]);
                $data ['footer'] = '';
            break;
            case 'modal-reg':
                $modal = new SignupForm();
                $data['status'] = true;
                $data['header'] = "Регистрация";
                $data['text'] = $this->renderPartial('/short/_reg', ['model' => $modal, 'footer' => $this->footer_polytic]);
            break;
            case 'req-pasw':
                $model = new PasswordResetRequestForm();
                $data['status'] = true;
                $data['header'] = "Восстановление пароля";
                $data['text'] = $this->renderPartial('/short/_recovery', ['model' => $model]);
                $data ['footer'] = $this->footer_polytic;
            break;
            case 'review':
                $model = new CommentForm(1);
                $data['status'] = true;
                $data['header'] = 'Оставить отзыв';
                $data['text'] = $this->renderAjax('/short/_comment', ['model' => $model]);
                $data ['footer'] = $this->footer_polytic;
            break;

            case "feedback" :
                $model = new FeedbackForm();
                $data['status'] = true;
                $data['header'] = 'Заказать звонок';
                $data['text'] = $this->renderAjax('/short/_feedback', ['model' => $model]);

            break;
        }

        return $data;
    }

    public function actionCallback(){
        //Скорее всего зашёл робот или сканер, нужно ему что-нибудь отдать
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if ( Yii::$app->request->isPost && Yii::$app->request->isAjax) {



            $post = Yii::$app->request->post();

            $model = new FeedBackForm();
            $model->name = $post['name'];
            $model->phone = $post['phone'];


            if ($model->sendEmail()){
                return [
                    'status'=>'true',
                    'statusss'=>'true',
                    'text'=>'Заявка принята, мы позвоним вам в близжайшее время',
                ];
            }else{
                return [
                    'status'=>'false',
                    'ssss'=>$model->sendEmail(),
                    'text'=>'Не удалось отправить сообщение администратору',
                ];
            }


        }
        return [
            'status'=>'true',
            'text'=>'Отправлено не по аяксу',
        ];

    }

    public function actionLogout() {
        $cokies = Yii::$app->request->cookies;
        if ($cokies->has('hash')) {
            $cokies = Yii::$app->response->cookies;
            $cokies->remove('hash');
        }
        Yii::$app->user->logout();
        return $this->redirect(['site/index']);
    }

    public function actionObratnaj() {

        $settings = Yii::$app->settings;
        $post = Yii::$app->request->post();
        Yii::$app->response->format = Response::FORMAT_JSON;
        $contactForm = new ContactForm();

        $contactForm->load( $post );
        if ( $contactForm->validate() ) {

            $message = '';
            $message .= "<p><b>Имя</b>: " . Html::encode( $contactForm->name ) . "</p>";
            $message .= "<p><b>Emai</b>l: " . Html::encode( $contactForm->email ) . "</b></p>";
            $message .= "<p><b>Телефон</b>: " . Html::encode( $contactForm->phone ) . "</b></p>";
            $message .= "<p>Текст: <br /> " . Html::encode( $contactForm->text ) . "</p>";

            Yii::$app->mailer->compose()
                    ->setFrom( [Yii::$app->params['adminEmail'] => Yii::$app->name . ' robot'] )
                    ->setTo( trim( $settings->get('Settings.email') ) )
                    ->setSubject( 'Форма обратной связи' )
                    ->setHtmlBody( $message )
                    ->send()
            ;

            return [
                'status' => true,
                'text' => 'Ваше сообщение отправлено!',
            ];
        } else {
            return ['status' => false];
        }
    }

    private function reGoogle($p) {
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

    public function actionComment() {
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

    public function actionSearch() {

        $searchModel = new \frontend\models\BrandsBoilersSearch();

        if (\Yii::$app->request->isAjax) {
            $post = $this->setAjaxRequest();
            $searchModel->load($post);
            $result = $searchModel->searchSphinx();

            if ($result['status']) {
                $str = '<ul>';
                $brands = $result['brand'];
                $i = 0;
                if (!empty($brands)) {

                    foreach ($brands as $brand) {

                        $str .= "<li data-name='" . strip_tags($brand['_name']) . "' data-count='" . ($i + 1) . "'> <a href='" . Url::to(['/goods/view', 'id' => $brand['id']]) . "' data-goods-id='" . $brand['id'] . "' >" . $brand['_name'];
                        if (!empty($brand['_article'])) {
                            $str .= "<p>" . $brand['_article'] . "</p>";
                        }
                        $str .= "</a></li>";
                        $i++;
                    }
                }
                $str .= '</ul>';
                return [
                    'status' => true,
                    'text' => $str
                ];
            }
            return [
                'status' => false,
            ];
        }
        
        $dataProvider = $searchModel->searchSphinxPage(Yii::$app->request->get());
        return $this->render('/goods/search', ['dataProvider' => $dataProvider, 'modelSearch' => $searchModel]);
    }

    public function actionSetCity()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $response = [];
        $cityId = Yii::$app->request->post()['cityId'];
        $city = City::findOne( $cityId );
        Yii::$app->city->add( $city );

        $response['status'] = true;
        $response['cityId'] = $cityId;

        return $response;
    }

    public function actionFeedback() 
    {
        $post = $this->setAjaxRequest();

        $feedbackForm = new FeedbackForm();

        $res = false;

        $settings = Yii::$app->settings;

        $response = [
            'status' => $res,
            'successModal' => [
                'title' => 'Отправка сообщения',
                'content' => 'Сообщение отправлено',
            ]
        ];

        
        $feedbackForm->load( $post );

        if ( $feedbackForm->validate() ) {
            $message = '';
            $message .= "<p><b>Имя</b>: " . Html::encode( $feedbackForm->name ) . "</p>";
            $message .= "<p><b>Телефон</b>: " . Html::encode( $feedbackForm->phone ) . "</b></p>";

            $res = Yii::$app->mailer->compose()
                    ->setFrom( [Yii::$app->params['adminEmail'] => Yii::$app->name . ' robot'] )
                    ->setTo( trim( $settings->get('Settings.email') ) )
                    ->setSubject( 'Форма обратного звонка' )
                    ->setHtmlBody( $message )
                    ->send()
            ;

            $response['status'] = $res;

        } else {
            $response['errors'] = $feedbackForm->getErrors();
            $response['successModal']['content'] = 'Ошибка отправки';
        }

        return $response;
    }

}