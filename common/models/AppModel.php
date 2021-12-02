<?php
namespace common\models;


use Yii;
use \yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;
use \yii\data\Pagination;
use rico\yii2images\behaviors\ImageBehave;
use yii\imagine\Image;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\base\Model;
use yii\helpers\Inflector;

abstract class AppModel extends ActiveRecord {



    /* Сохранение изображений */
    public function upload($img, $max_width = 1200, $max_height = 900) {
        if ($this->validate()) {
            if (!empty($this->getImageByName($this->tableName() . '_' . $img)->itemId)) {
                $this->removeImage($this->getImageByName($img));
            }
            $path = $_SERVER['DOCUMENT_ROOT'] . '/files/images/store/' . $this->$img->baseName . '.' . $this->$img->extension;
            Image::resize($this->$img->tempName, $max_width, $max_height, true, false)->save($path);
            $this->attachImage($path, true, $this->tableName() . '_' . $img);
            @unlink($path);
            return true;
        }
        print_r($this->getErrors());
        die;
        return false;
    }

    public function uploadSvg($img) {
                if ($this->validate()) {
            if (!empty($this->getImageByName($img)->itemId)) {
                $this->removeImage($this->getImageByName($img));
            }
            $path = $_SERVER['DOCUMENT_ROOT'] . '/files/images/store/' . $this->$img->baseName . '.' . $this->$img->extension;
            $this->$img->saveAs($path);
            $this->attachImage($path, true, $img);
            @unlink($path);
            return;
        }
        print_r($this->getErrors());
        die;
        return false;
    }

    /* Сохранение документов */

    public function uploadFiles() {
        if ($this->validate()) {
            $path = Yii::getAlias('@filesImage');
            $dirName = $path . '/files/files/page_' . $this->id . '/';
            if (empty(file_exists($dirName))) {
                mkdir($dirName, 0755, true);
            }
            $i = 0;
            $strName = '';
            foreach ($this->files as $file) {
                $pathToFile = str_replace(' ', '_', $file->baseName) . "_" . time() . "." . $file->extension;
                $file->saveAs($dirName . $pathToFile);
                $strName .= $pathToFile . ',';
                $i++;
            }
            $this->files = null;
            $this->plan .= $strName;
            $this->save();
            return true;
        } else {
            print_r($this->getErrors());
            die;
            return false;
        }
    }

    /* Получение правильной даты (+ 3 часа к выбранному числу) */

    public function getRightDate($date) {
        if (!empty($date)) {
            return $date = $date + 4 * 60 * 60;
        } else {
            return $date = 0;
        }
    }

    /* Получение актуального ActiveDataProvider для раздела на backend(вызывается в разделе) */
    public function getDataProvider( $pageSize = 100 ) {
        $query = self::find();
        if ( ! empty( $query ) ) {
            return new ActiveDataProvider([
                'query' => $query,
                'sort' => false,
                'pagination' => [
                    'pageSize' => $pageSize,
                ],
            ]);
        } else {
            return false;
        }
    }

    /* Получение объeкта пагинации для вывода на страницу со всеми эдементами раздела */

    public static  function getPagination($count) {
        $query = self::find()->where(['visibility' => 1, 'is_delete' => 0]);
        return new Pagination([
            'defaultPageSize' => $count,
            'totalCount' => $query->count(),
        ]);
    }

    /* Получение модели по id */

    public static function getModelById($id) {
        $model = self::find()->where(['id' => $id, 'is_delete' => 0])->one();
        if ($model !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Запрашиваемая страница не существует');
    }

    /* Получение списка моделей с пагинацией для вывода на front, без - back */

    public static function getModelsBy($pagination = false) {
        if ($pagination) {
            return self::find()->where(['visibility' => 1, 'is_delete' => 0])->orderBy(['created_at' => SORT_DESC])->offset($pagination->offset)->limit($pagination->limit)->all();
        } else {
            return self::find()->where(['visibility' => 1, 'is_delete' => 0])->orderBy(['created_at' => SORT_DESC])->all();
        }
    }


    const CONST_LIST_DROP_DOWN = [
        'Нет',
        'Да'
    ];

    public static function getDropDownListStatic($id = null) {
        if (is_null($id)) {
            return self::CONST_LIST_DROP_DOWN;
        }
        if (!isset(self::CONST_LIST_DROP_DOWN[$id])) {
            return self::CONST_LIST_DROP_DOWN[count(self::CONST_LIST_DROP_DOWN) - 1];
        }
        return self::CONST_LIST_DROP_DOWN[$id];
    }

    public function getDropDownList($id = null, $attribute) {
        return self::getDropDownListStatic(is_null($id) ? $this->$attribute : $id);
    }

    public static function getListForSelect( $attributeName = null )
    {
        $values = [];
        if ( ! is_null( $attributeName ) ) {
            $values =  ArrayHelper::map(self::find()->all(), 'id', $attributeName );
        }

        return $values;
    }

    public static function generateSlug($name)
    {
        return Inflector::slug($name);
    }


}
