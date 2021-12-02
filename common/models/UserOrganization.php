<?php

namespace common\models;

use Yii;

class UserOrganization extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'user_organization';
    }

    
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ],
        ];
    }

    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'nds', 'is_delete'], 'integer'],
            [
                [
                    'name', 'phone',
                    'indeks', 'city', 'street', 'home', 'build',
                    'corpus', 'office', 'office_mark',
                    'inn', 'kpp', 'bank_name', 'raschet_number', 'bik',
                    'korrekt_number', 'director', 'accountant', 'text_mark'
                ], 'string', 'max' => 255
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'user_id' => 'Пользователь',
            'name' => 'Организация',
            'phone' => 'Телефон',
            'indeks' => 'Индекс',
            'city' => 'Город',
            'street' => 'Улица',
            'home' => 'Дом',
            'build' => 'Строение',
            'corpus' => 'Корпус',
            'office' => 'Квартира/Офис',
            'office_mark' => 'Примечание',
            'inn' => 'ИНН',
            'kpp' => 'КПП',
            'bank_name' => 'Наименование банка',
            'raschet_number' => 'Расчетный счет',
            'bik' => 'БИК',
            'korrekt_number' => 'Корр.счет',
            'director' => 'Директор',
            'accountant' => 'Бухгалтер',
            'nds' => 'НДС',
            'text_mark' => 'Примечание',
        ];
    }

    public function getUser()
    {
        return UserData::hasOne(User::class, ['id' => 'user_id']);
    }

}
