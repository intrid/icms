<?php

namespace frontend\modules\user\components;

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

    private $client;

    public function __construct(ClientInterface $client) {
        $this->client = $client;
    }

    public function handle() {
        if (!Yii::$app->user->isGuest) {
            return;
        }

        $attributes = $this->client->getUserAttributes();
     
        $auth = $this->findAuth($attributes);

        if ($auth) {
            /* @var User $user */
            $user = $auth->user;

            return Yii::$app->user->login($user);
        }
        if ($user = $this->createAccount($attributes)) {

            return Yii::$app->user->login($user);
        }
    }

    /**
     * @param array $attributes
     * @return Auth
     */
    private function findAuth($attributes) {
        $id = ArrayHelper::getValue($attributes, 'id');
        $params = [
            'source_id' => $id,
            'source' => $this->client->getId(),
        ];
        return Auth::find()->where($params)->one();
    }

    /**
     * 
     * @param type $attributes
     * @return User|null
     */
    private function createAccount($attributes) {
        $email = ArrayHelper::getValue($attributes, 'email');
        $id = ArrayHelper::getValue($attributes, 'id');

        if (isset($attributes['username'])) {
            $name = ArrayHelper::getValue($attributes, 'username');
        }
        if (isset($attributes['name'])) {
            $name = ArrayHelper::getValue($attributes, 'name');
        }


        if ($email !== null && User::find()->where(['email' => $email])->exists()) {
            return;
        }

        $user = $this->createUser($email, $name);

        $transaction = User::getDb()->beginTransaction();
        if ($user->save()) {
            $auth = $this->createAuth($user->id, $id);
            if ($auth->save()) {
                $userData = $this->createUserData($user->id, $email);
                $userData->save();
                $transaction->commit();
                return $user;
            }
        }
        $transaction->rollBack();
    }

    private function createUser($email, $name) {
        return new User([
            'username' => $name === null ? $email : $name,
            'email' => $email === null ? $name . '@no-email.ru' : $email,
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash(Yii::$app->security->generateRandomString()),
            'created_at' => $time = time(),
            'updated_at' => $time,
        ]);
    }

    private function createAuth($userId, $sourceId) {
        return new Auth([
            'user_id' => $userId,
            'source' => $this->client->getId(),
            'source_id' => (string) $sourceId,
        ]);
    }

    private function createUserData($userId, $email) {
        return new UserData([
            'user_id' => $userId,
            'type_user' => 1,
            'type_opt' => 0,
            'user_fio' => $email
        ]);
    }

}
