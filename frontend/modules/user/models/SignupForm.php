<?php

namespace frontend\modules\user\models;

use Yii;
use yii\base\Model;
use frontend\models\User;
use common\models\UserData;
use common\components\MyHelper;

/**
 * Signup form
 */
class SignupForm extends Model
{


    public $username;
    public $email;
    public $password;
    public $user_fio;
    public $phone;
    public $repeatpassword;
    public $address;
    public $type_user;

    public $user_id;



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'unique', 'targetClass' => '\frontend\models\User', 'message' => 'Этот логин уже занят. Если вы забыли пароль, воспользуйтесь функцией восстановления пароля'],
            ['email', 'string', 'min' => 2, 'max' => 255],

            // ['email', 'trim'],
            // ['email', 'required'],
            // ['email', 'email'],
            // ['email', 'string', 'max' => 255],
            // ['email', 'unique', 'targetClass' => '\frontend\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['repeatpassword', 'compare', 'compareAttribute' => 'password', 'message' => "Пароли не совпадают"],

            ['user_fio', 'required'],
            ['user_fio', 'string', 'max' => 400],

            ['phone', 'required'],
            ['phone', 'string', 'max' => 20],

        ];
    }
    public function attributeLabels()
    {
        //        parent::attributes();
        return [
            'user_fio' => 'Ф.И.О',
            'phone' => 'Телефон',
            'email' => 'E-mail (Ваш логин)',
            'password' => 'Пароль',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup($model)
    {
        if (!$this->validate()) {
            return null;
        }

        $transaction = Yii::$app->db->beginTransaction();

        $user = new User();
        $user->username = $this->email;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->status = User::STATUS_FRONT;

        if ($user->save()) {
            $data = new UserData();
            $data->user_fio = $model['user_fio'];
            $data->user_id = $user->id;
            $data->email = $user->email;
            $data->phone = $model['phone'];
            $data->type_user = 1;
            $data->save(false);

            $transaction->commit();

            return $user;
        } else {
            return null;
            $transaction->rollBack();
        }

        if ($user->save()) {
            $transaction->commit();
            return $user;
        } else {
            return null;
        }
    }

    public function signupInCart($model)
    {
        if (!$this->validate()) {
            return null;
        }

        $transaction = Yii::$app->db->beginTransaction();

        $user = new User();
        $user->username = $this->email;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->status = User::STATUS_FRONT;

        if ($user->save()) {
            $data = new UserData();
            $data->user_fio = htmlspecialchars($model['user-name']);
            $data->user_id = $user->id;
            $data->email = $user->email;
            $data->phone = htmlspecialchars($model['user-phone']);
            $data->type_user = 1;
            $data->save(false);

            $transaction->commit();

            return $user;
        } else {
            return null;
            $transaction->rollBack();
        }

        if ($user->save()) {
            $transaction->commit();
            return $user;
        } else {
            return null;
        }
    }

    public function saveLk($model)
    {
        if (!$this->validate()) {
            return false;
        }

        $user = User::find()->where(['id' => Yii::$app->user->identity->id])->limit(1)->one();
        $user->email = $this->username;

        if ($user->save()) {
            $data = UserData::find()->where(['user_id' => $user->id])->limit(1)->one();
            $data->user_fio = $model['user_fio'];
            $data->phone = $model['phone'];
            $data->email = $model['email'];
            $data->save(false);
            return true;
        } else {
            return null;
        }

        return $user->save() ? true : false;
    }

    public  function signupCart()
    {
        if (!$this->validate()) {

            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->username;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->status = 5;

        if ($user->save()) {
            $data = new UserData();
            $data->user_fio = $this->user_fio;
            $data->email = $this->email;
            $data->user_id = $user->id;
            $data->phone = $this->phone;
            $data->type_user =  1;
            $data->organization = '';
            $data->address = '';
            $data->save(false);
            return $user;
        } else {

            return null;
        }

        return $user->save() ? $user : null;
    }

    public function sendEmail()
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_FRONT,
            'email' => $this->email,
        ]);

        if (!$user) {
            return false;
        }
        $mailer = MyHelper::getIcmsMailer();
        return $mailer
            ->compose(
                ['html' => 'signup-html', 'text' => 'signup-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['admin_email'] => Yii::$app->name])
            ->setTo($this->email)
            ->setSubject('Регистрация')
            ->send();
    }
}
