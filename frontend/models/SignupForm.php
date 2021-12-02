<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\User;

/**
 * Signup form
 */
class SignupForm extends Model {

    public $username;
    public $email;
    public $password;
    public $phone;

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['phone', 'string'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup() {

        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save() && $this->sendEmail($user);
    }

    public function signupCart() 
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->email;
        $user->email = $this->email;
        $user->status = User::STATUS_ACTIVE;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        if ($user->save()) {
            $data = new \common\models\UserData();
            $data->user_fio = $this->username;
            $data->email = $this->email;
            $data->user_id = $user->id;
            $data->type_user = 1;
            $data->phone = $this->phone;
            $data->subscribe = 0;
            $data->unsubscribe = Yii::$app->security->generateRandomString();
            $data->is_delete = 0;
            $data->save();
        }

//        $this->sendEmailCart( $user, $this->password );
        
        return $user ?? false;
    }

    protected function sendEmailCart($user, $password) 
    {
        return Yii::$app
                        ->mailer
                        ->compose(
                                ['html' => 'cart-registration-html'], ['user' => $user, 'password' => $password]
                        )
                        ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name . ' robot'])
                        ->setTo($this->email)
                        ->setSubject('Регистрация на сайте ' . Yii::$app->name )
                        ->send();
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user) 
    {
        return Yii::$app
                        ->mailer
                        ->compose(
                                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'], ['user' => $user]
                        )
                        ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
                        ->setTo($this->email)
                        ->setSubject('Account registration at ' . Yii::$app->name)
                        ->send();
    }

}
