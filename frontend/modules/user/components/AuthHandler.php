<?php

namespace frontend\modules\user\components;

//use app\models\Auth;
//use app\models\User;
//use Yii;
//use yii\authclient\ClientInterface;
//use yii\helpers\ArrayHelper;

use frontend\modules\user\models\Auth;
use frontend\models\User;
use common\models\UserData;
use Yii;
use yii\authclient\ClientInterface;
use yii\helpers\ArrayHelper;

/**
 * AuthHandler handles successful authentication via Yii auth component
 */
class AuthHandler {

    /**
     * @var ClientInterface
     */
    private $client;

    public function __construct(ClientInterface $client) {
        $this->client = $client;
    }

    public function handle() {
        $attributes = $this->client->getUserAttributes();

        /* @var $auth Auth */
        $auth = Auth::find()->where([
                    'source' => $this->client->getId(),
                    'source_id' => $attributes['id'],
                ])->one();

        if (Yii::$app->user->isGuest) {
            if ($auth) { // авторизация
                $user = $auth->user;
                $this->cartUser($user->id);
                Yii::$app->user->login($user);
            } else { // регистрация
                if (isset($attributes['email']) && User::find()->where(['email' => $attributes['email']])->exists()) {
                    Yii::$app->getSession()->setFlash('error', [
                        Yii::t('app', "Пользователь с такой электронной почтой как в {client} уже существует, но с ним не связан. Для начала войдите на сайт использую электронную почту, для того, что бы связать её.", ['client' => $this->client->getTitle()]),
                    ]);
                } else {
                    $password = Yii::$app->security->generateRandomString(6);
                    $user = new User([
                        'username' => $attributes['login'] !== null ? $attributes['login'] : $attributes['email'],
                        'email' => $attributes['email'],
                        'password' => $password,
                    ]);
                    $user->generateAuthKey();
                    $user->generatePasswordResetToken();
                    $transaction = $user->getDb()->beginTransaction();
                    if ($user->save()) {

                        $auth = new Auth([
                            'user_id' => $user->id,
                            'source' => $this->client->getId(),
                            'source_id' => (string) $attributes['id'],
                        ]);
                        if ($auth->save()) {

                            $userData = $this->createUserData($user, $auth);
                            $userData->save();

                            $transaction->commit();
                            $this->cartUser($user->id);
                            Yii::$app->user->login($user);
                        } else {
                            print_r($auth->getErrors());
                        }
                    } else {
                        print_r($user->getErrors());
                    }
                }
            }
        } else { // Пользователь уже зарегистрирован
            if (!$auth) { // добавляем внешний сервис аутентификации
                $auth = new Auth([
                    'user_id' => Yii::$app->user->id,
                    'source' => $this->client->getId(),
                    'source_id' => $attributes['id'],
                ]);
                $auth->save();
            }
        }
    }

    private function createUserData($user, $auth) {


        switch ($this->client->getId()) {
            case 'vkontakte':
                $api_url = 'https://api.vk.com/method/users.get?user_ids=' . $auth->source_id . '&fields=first_name,last_name&access_token=' . Yii::$app->params['source_id'] . '&version=5.80';
                $api_response = json_decode(file_get_contents($api_url));
                $fio = $api_response->response[0]->first_name." ".$api_response->response[0]->last_name;
                break;
        }
     
        return new UserData([
            'user_id' => $user->id,
            'type_user' => 1,
            'type_opt' => 0,
            'user_fio' => $fio,
        ]);
    }
    
    private function cartUser($id){
        $session = Yii::$app->session;
        if(!isset($session['cart'])){
            return false;
        }else{
            $cart = $session['cart'];
            $cart['user'] = $id;
            $session['cart'] = $cart;
            return true;
        }
    }

}
