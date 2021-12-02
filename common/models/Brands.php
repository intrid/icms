<?php

namespace common\models;

use common\models\AppModel;
use yii\helpers\ArrayHelper;
use yii\imagine\Image;
use Yii;

class Brands extends AppModel
{
    public $prev;

    public static function tableName()
    {
        return 'brands';
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
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['visibility'], 'integer'],
            [['prev'], 'file', 'skipOnEmpty' => true, 'extensions' => ['jpg', 'png', 'jpeg'], 'maxFiles' => 1],

        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'visibility' => 'Опубликовать',
        ];
    }

    public function uploadImgPrev(): bool
    {
        if ($this->validate()) {

            $path = $_SERVER['DOCUMENT_ROOT'] . '/files/images/store/' . $this->prev->baseName . "." . $this->prev->extension;

            Image::resize($this->prev->tempName, 1200, 900, true, false)->save($path);
            $this->attachImage($path, true, 'brands_desktop');
            $this->prev = '';
            @unlink($path);
            return true;
        } else {
            return false;
        }
    }

    public static function dropDown()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
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
