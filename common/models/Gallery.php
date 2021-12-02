<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Inflector;
use yii\imagine\Image;

class Gallery extends AppModel
{
    public $images;
    public $prev;

    public static function tableName(): string
    {
        return 'gallery';
    }

    public function rules(): array
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
            [['short_text'], 'string', 'max' => 1000],
            [['visibility'], 'integer'],
            [['prev'], 'file', 'skipOnEmpty' => true, 'extensions' => ['jpg', 'png', 'jpeg'], 'maxFiles' => 1],
            [['images'], 'file', 'skipOnEmpty' => true, 'extensions' => ['jpg', 'png', 'jpeg'], 'maxFiles' => 10],
        ];
    }

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'id',
            'name' => 'Наименование',
            'short_text' => 'Краткое описание',
        ];
    }

    /**
     * Генерация slug
     */
    public static function generateSlug($name)
    {
        return Inflector::slug($name);
    }

    public function uploadImgPrev(): bool
    {

        if ($this->validate()) {

            $path = $_SERVER['DOCUMENT_ROOT'] . '/files/images/store/' . $this->prev->baseName . "." . $this->prev->extension;

            Image::resize($this->prev->tempName, 1200, 900, true, false)->save($path);
            $this->attachImage($path, true, 'gallery_prev_' . time());
            $this->prev = '';
            @unlink($path);
            return true;
        } else {
            return false;
        }
    }

    public function uploadImg(): bool
    {
        if ($this->validate()) {
            $i = 0;
            foreach ($this->images as $file) {

                $path =  $_SERVER['DOCUMENT_ROOT'] . '/files/images/store/' . $file->baseName . "." . $file->extension;

                Image::resize($file->tempName, 1200, 900, true, false)->save($path);
                $this->attachImage($path, false, 'gallery_images' . time() . '_' . $i);
                @unlink($path);
                $i++;
            }
            $this->images = '';
            return true;
        } else {
            return false;
        }
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
