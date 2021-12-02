<?php

namespace common\components\Seo;

use Yii;

/**
 * This is the model class for table "seos".
 *
 * @property int $id
 * @property string $entity_name Имя класса( без namespace )
 * @property int $entity_id ID сущности
 * @property string $h1
 * @property string $title
 * @property string $keywords
 * @property string $description
 */
class Seo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['entity_id'], 'integer'],
            [['h1', 'title', 'keywords', 'description'], 'string'],
            [['entity_name'], 'string', 'max' => 255],
            [['entity_name', 'entity_id'], 'unique', 'targetAttribute' => ['entity_name', 'entity_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entity_name' => 'Entity Name',
            'entity_id' => 'Entity ID',
            'h1' => 'H1',
            'title' => 'Title',
            'keywords' => 'Keywords',
            'description' => 'Description',
        ];
    }
}
