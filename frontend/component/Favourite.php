<?php

namespace frontend\component;

use common\models\goods\Good;

class Favourite
{
    const DEFAULT_COOKIE_NAME = "favourite";

    private $_favourite;
    private $_models;

    public function __construct()
    {
        if (isset($_COOKIE[self::DEFAULT_COOKIE_NAME])) {
            $this->_favourite = json_decode($_COOKIE[self::DEFAULT_COOKIE_NAME], true);
        } else {
            $this->_favourite = ['good_ids' => []];
        }
    }

    /**
     * Добавить товар в куки
     */
    public function add($id)
    {
        $favourite = $this->_favourite;

        if (isset($favourite['good_ids'][$id])) {
            return true;
        } else {
            $this->_favourite['good_ids'][$id] = $id;
        }
        $this->save();

        return true;
    }

    /**
     * Удалить товар из куки
     */
    public function delete($id)
    {
        unset($this->_favourite['good_ids'][$id]);
        $this->save();

        return true;
    }

    /**
     * Количество товаров для показа
     */
    public function getGoodCount($hash)
    {
        $good_id = $this->_favourite['products'][$hash]['good_id'];
        $good = Good::find()->where(['id' => $good_id])->one();

        if (!empty($good->constructor_id)) {
            $quantity = 1;
        } else {
            $quantity = $this->_favourite['products'][$hash]['quantity'];
        }

        return $quantity;
    }

    public function getProducts()
    {
        $this->getAllProductModel();

        return $this->_favourite['good_ids'];
    }

    /**
     * Получить id товаров из куки
     */
    public static function getIds()
    {
        $array = [];
         if (isset($_COOKIE[self::DEFAULT_COOKIE_NAME])){
            $array = json_decode($_COOKIE[self::DEFAULT_COOKIE_NAME], true)["good_ids"];

         }
        // if(json_decode($_COOKIE[self::DEFAULT_COOKIE_NAME], true)["good_ids"]) {
        //     $array = json_decode($_COOKIE[self::DEFAULT_COOKIE_NAME], true)["good_ids"];
        	
        // }
        return $array;
    }

    public function getCount()
    {
        $this->getAllProductModel();

        return count($this->_favourite['good_ids']);
    }

    public function getAllProductModel()
    {
        if (!empty($this->_models)) {
            return $this->_models;
        }

        $good_ids = $this->_favourite['good_ids'];

        foreach ($good_ids as $good_id) {

            $good = Good::find()->where(['id' => $good_id])->one();
            if(!empty($good)){
                $this->_models[] = $good;

            }
        }

        return $this->_models;
    }

    private function save()
    {
        setcookie(self::DEFAULT_COOKIE_NAME, json_encode($this->_favourite), time() + 3600 * 24 * 7, "/");  /* срок действия 1 неделя */
        return;
    }
}
