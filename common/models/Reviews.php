<?php

namespace common\models;
use Yii;

class Reviews extends \yii\db\ActiveRecord
{
    public $dateTime;
    public $created_at_str;

    public static function tableName()
    {
        return 'reviews';
    }

    public function rules()
    {
        return [
            [['is_delete',  'is_published','created_at' , 'updated_at',], 'integer'],
            [['created_at_str'], 'string'],
            ['created_at', 'default', 'value' => time()], //значение по умолчанию
            ['dateTime', 'date', 'format' => 'php:d.m.Y H:i'], //формат модели с которой будем работать,
            [['text',], 'string'],
            [['name',], 'string'],
            [['link',], 'string'],
            [['name', 'text'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'text' => 'Текст',
            'name' => 'ФИО',
            'link' => 'Ссылка',
            'is_delete' => 'Удален ли?',
            'created_at' => 'Дата',
            'created_at_str' => 'Дата',
            'is_published' => 'Опубликован ли?',
            'dateTime' => 'Дата'
        ];
    }

    /**
     * @return string
     */
    public function getDateTime()
    {
        return $this->created_at ? \DateTime::createFromFormat('U', $this->created_at)
            ->modify('+3 hour')->format('d.m.Y H:i') : '';
    }

    public function setDateTime($string)
    {
        $date = \DateTime::createFromFormat('d.m.Y H:i', $string);
        $this->created_at = $date->format('U');
    }

    public function beforeSave($insert)
    {
        $this->updated_at = $this->created_at;
        return parent::beforeSave($insert);
    }

    public static function getListYesNo($id = false) {
        $array = [
            'Нет',
            'Да',
        ];
        if (is_bool($id)) {
            return $array;
        }
        return $array[$id];
    }

}