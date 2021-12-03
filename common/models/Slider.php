<?php

namespace common\models;

use common\models\AppModel;
use yii\helpers\ArrayHelper;
use yii\imagine\Image;
use Yii;

class Slider extends AppModel
{
    public $prev;
    public $prev_mobile;
    public $prev_tablet;

    public static function tableName()
    {
        return 'slider';
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
            [['name'], 'string'],
            [['visibility'], 'integer'],
            [['prev'], 'file', 'skipOnEmpty' => true, 'extensions' => ['jpg', 'png', 'jpeg'], 'maxFiles' => 1],
            [['prev_mobile'], 'file', 'skipOnEmpty' => true, 'extensions' => ['jpg', 'png', 'jpeg'], 'maxFiles' => 1],
            [['prev_tablet'], 'file', 'skipOnEmpty' => true, 'extensions' => ['jpg', 'png', 'jpeg'], 'maxFiles' => 1],

        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Текст',
            'visibility' => 'Опубликовать',
        ];
    }

    public function uploadImgPrev(): bool
    {
        if ($this->validate()) {

            $path = $_SERVER['DOCUMENT_ROOT'] . '/files/images/store/' . $this->prev->baseName . "." . $this->prev->extension;

            Image::resize($this->prev->tempName, 1920, 1080, true, false)->save($path);
            $this->attachImage($path, true, 'slider_desktop');
            $this->prev = '';
            @unlink($path);
            return true;
        } else {
            return false;
        }
    }

    public function uploadImgPrevMobile(): bool
    {
        if ($this->validate()) {

            $path = $_SERVER['DOCUMENT_ROOT'] . '/files/images/store/' . $this->prev_mobile->baseName . "." . $this->prev_mobile->extension;

            Image::resize($this->prev_mobile->tempName, 1920, 1080, true, false)->save($path);
            $this->attachImage($path, true, 'slider_mobile');
            $this->prev_mobile = '';
            @unlink($path);
            return true;
        } else {
            return false;
        }
    }

    public function uploadImgPrevTablet(): bool
    {
        if ($this->validate()) {

            $path = $_SERVER['DOCUMENT_ROOT'] . '/files/images/store/' . $this->prev_tablet->baseName . "." . $this->prev_tablet->extension;

            Image::resize($this->prev_tablet->tempName, 1920, 1080, true, false)->save($path);
            $this->attachImage($path, true, 'slider_tablet');
            $this->prev_tablet = '';
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
