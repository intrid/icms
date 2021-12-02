<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "seo".
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property int $is_delete
 */
class SeoSection extends AppModel
{
    
    public static function tableName()
    {
        return 'seos_sections';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['is_delete'], 'integer'],
            [['name', 'title', 'slug'], 'string', 'max' => 254],
            [['keywords'], 'string', 'max' => 300],
            [['description'], 'string', 'max' => 500],
            [['text'], 'string'],
            [['slug'], 'trim'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'H1',
            'title' => 'Title',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'slug' => 'ЧПУ для формирования ссылки к разделу', 
            'text' => 'Текст',
        ];
    }

    public function beforeSave($insert)
    {
        if ( ! parent::beforeSave( $insert ) ) {
            return false;
        }

        $this->slug = trim( $this->slug, '/ ' );

        return true;
    }

    /* frontend */
    public static function getSeoById( $id )
    {
        return self::find()->where(['id' => $id])->one();
    }

}
