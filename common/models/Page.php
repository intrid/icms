<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

class Page extends AppModel { 

    public function behaviors() { 
        return [
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'name',
                'immutable' => true,
            ],
            TimestampBehavior::class,
        ];
    }

    public static function tableName() {
        return 'page';
    }

    public function rules() {
        return [
            [['name'], 'required'],
            [['updated_at', 'created_at', 'visibility', 'sort', 'is_delete'], 'integer'],

            ['date', 'integer'], //проверка
            ['date', 'default', 'value' => time()], //значение по умолчанию
            ['dateTime', 'date', 'format' => 'php:d.m.Y H:i'], //формат модели с которой будем работать,

            [['name', 'slug', 'short_text', 'text_one', 'text_two', 'text_three','h1', 'title', 'keywords', 'description'], 'string'],
        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'Наименование',
            'slug' => 'ЧПУ',
            'short_text' => 'Краткое описание',
            'text_one' => 'Текст',
            'text_two' => 'Блок 2',
            'text_three' => 'Блок 3',
            'visibility' => 'Опубликовать',
            'sort' => 'Порядковый номер в меню',
            'h1' => 'H1',
            'title' => 'Title',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
            'is_delete' => 'Отметка удаления',
            'dateTime' => 'Дата и время публикации',
            'date' => 'Дата публикации',
        ];
    }

    public function getDateTime()
    {
        return $this->date ? \DateTime::createFromFormat('U', $this->date)
            ->modify('+3 hour')->format('d.m.Y H:i') : '';
    }

    public function setDateTime($string)
    {
        $date = \DateTime::createFromFormat('d.m.Y H:i', $string);
        $this->date = $date->format('U');
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
