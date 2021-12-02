<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_data".
 *
 * @property int $id
 * @property int $user_id
 * @property string $user_fio
 * @property string $organization
 * @property string $phone
 * @property string $city
 * @property string $url_site
 * @property int $type_user
 * @property int $type_opt
 */
class UserData extends \yii\db\ActiveRecord {

    public $password;
    public $repeatpassword;

    const CONST_TYPE_USER = [
        1 => "Пользователь/прораб",
        2 => "Оптовый покупатель/магазин",
    ];

    public static function tableName() {
        return 'user_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            ['password', 'string', 'min' => 6],
            ['repeatpassword', 'compare', 'compareAttribute' => 'password', 'message' => "Пароли не совпадают"],
            [['user_id', 'type_user', 'is_delete'], 'integer'],
            [['user_fio', 'organization', 'phone', 'address'], 'string', 'max' => 255],
            ['subscribe', 'integer'],
            ['subscribe', 'default', 'value' => 0],
            ['unsubscribe', 'string'],
            ['unsubscribe', 'default', 'value' => Yii::$app->getSecurity()->generateRandomString(32)],
            ['email', 'string'],
            ['email', 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'user_fio' => 'Ф.И.О.',
            'organization' => 'Организация',
            'phone' => 'Телефон',
            'address' => 'Адрес',
            'type_user' => 'Тип пользователя',
            'email' => 'E-mail',
            'subscribe' => 'Рассылка',
            'repeatpassword' => 'Повторите пароль',
            'password' => 'Пароль',
        ];
    }

    public function behaviors() {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ],
        ];
    }

    public function getUser() {
        return UserData::hasOne(User::class, ['id' => 'user_id']);
    }

    public static function getTypeUser($id = null) {
        if (is_null($id)) {
            return self::CONST_TYPE_USER;
        }
        if (!isset(self::CONST_TYPE_USER[$id])) {
            return self::CONST_TYPE_USER[count(self::CONST_TYPE_USER) - 1];
        }
        return self::CONST_TYPE_USER[$id];
    }

    public function getTypeUserS($id = null) {
        return self::getTypeUser(is_null($id) ? $this->type_user : $id);
    }

}
