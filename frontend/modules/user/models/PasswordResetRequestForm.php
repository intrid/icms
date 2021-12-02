<?php

namespace frontend\modules\user\models;

use common\components\MyHelper;
use Yii;
use yii\base\Model;
use frontend\models\User;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            [
                'email', 'exist',
                'targetClass' => '\frontend\models\User',
                'filter' => ["status" => [User::STATUS_FRONT]],
                'message' => 'Пользователь не найден.'
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return bool whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */
        $user = User::findOne(['username' => $this->email]);

        if (!$user) {
            return false;
        }

        if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
           
            if (!$user->save()) {
                return false;
            }
        }
        $mailer = MyHelper::getIcmsMailer();
        return $mailer->compose(
                ['html' => 'passwordResetToken-html'],
                ['user' => $user]
            )
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setTo($user->email)
            ->setSubject('Сброс пароля')
            ->send();
    }
}
