<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;

class ChangePasswordForm extends Model {

    public $new_password, $repeat_new_password;

    public function rules() {
        return [
            [['new_password', 'repeat_new_password'], 'required'],
            [['new_password'], 'string', 'min' => 6],
            ['repeat_new_password', 'compare', 'compareAttribute' => 'new_password', 'message' => "Пароли не совпадают"],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'username' => 'Логин',
            'new_password' => 'Новый пароль',
            'repeat_new_password' => 'Повторите новый пароль'
        ];
    }

    public function save() {
        $model = User::find()->where(['id' => Yii::$app->user->identity->id])->limit(1)->one();
        $model->password = $this->new_password;
        $model->save();
    }

}
