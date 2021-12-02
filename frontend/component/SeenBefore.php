<?php

namespace frontend\component;

use common\models\goods\Good;

/**
 * Слайдер "Смотрели ранее"
 */
class SeenBefore
{
    const DEFAULT_COOKIE_NAME = "seenBefore";
    const MAX_GOODS = 10;

    private $_seenBefore;
    private $_models;

    public function __construct()
    {
        if (isset($_COOKIE[self::DEFAULT_COOKIE_NAME])) {
            $this->_seenBefore = json_decode($_COOKIE[self::DEFAULT_COOKIE_NAME], true);
        } else {
            $this->_seenBefore = ['good_ids' => []];
        }
    }


    /**
     * Добавление id товара в список "Смотрели ранее"
     */
    public function add($id)
    {

        $seenBefore = $this->_seenBefore;

        // Если объектов 13 - удалить первый элемент и добавить новый в начало
        if (count($this->_seenBefore['good_ids']) > 13) {
            $firstElem = array_shift($this->_seenBefore['good_ids']);
            $this->delete($firstElem);
        }

        if (isset($seenBefore['good_ids'][$id])) {
            return true;
        } else {
            $this->_seenBefore['good_ids'][$id] = $id;
        }
        $this->save();

        return true;
    }

    /**
     * Удаление id товара из списка "Смотрели ранее"
     */
    public function delete($id)
    {
        unset($this->_seenBefore['good_ids'][$id]);
        $this->save();

        return true;
    }


    public function getProducts()
    {
        $this->getAllProductModel();

        return $this->_seenBefore['good_ids'];
    }

    /**
     * Получить модели товаров по id
     */
    public function getAllProductModel()
    {
        if (!empty($this->_models)) {
            return $this->_models;
        }

        $good_ids = array_reverse($this->_seenBefore['good_ids']);

        foreach ($good_ids as $good_id) {

            $good = Good::find()->where(['id' => $good_id])->one();
            $this->_models[] = $good;
        }

        return $this->_models;
    }

    private function save()
    {
        setcookie(self::DEFAULT_COOKIE_NAME, json_encode($this->_seenBefore), time() + 3600 * 24 * 7, "/");  /* срок действия 1 неделя */
        return;
    }
}
