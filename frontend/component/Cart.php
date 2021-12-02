<?php

namespace frontend\component;

use common\models\goods\Good;

class Cart
{
    const DEFAULT_COOKIE_NAME = "cart";

    private $_cart;
    private $_models;
    private $_goods;


    public function __construct()
    {

        if (isset($_COOKIE[self::DEFAULT_COOKIE_NAME])) {
            $this->_cart = json_decode($_COOKIE[self::DEFAULT_COOKIE_NAME], true);
        } else {
            $this->_cart = [
                'products' => [],
                'cost' => 0,
            ];
        }
    }

    /**
     * Добавить товар и установить количество в куки
     */
    public function add($product)
    {
        $cart = $this->_cart;
        $hash = $this->getHash($product);

        if (isset($cart['products'][$hash])) {
            $this->setQuantity($hash, $product['quantity']);
        } else {
            $this->_cart['products'][$hash] = $product;
        }

        $this->save();

        return true;
    }

    /**
     * Установить количество
     */
    public function setQuantity($hash, $quantity)
    {
        if ($this->_cart['products'][$hash]['quantity'] + $quantity < 1) {
            $this->_cart['products'][$hash]['quantity'] = 1;
        } else {
            $this->_cart['products'][$hash]['quantity'] += $quantity;
        }
        $this->save();
        return;
    }

    /**
     * Хэш товара по параметрам (id)
     */
    private function getHash($product)
    {
        return md5(serialize([$product['good_id']]));
    }

    /**
     * Удалить товар по hash
     */
    public function delete($hash)
    {
        unset($this->_cart['products'][$hash]);
        $this->save();

        return true;
    }


    /**
     * Очистить корзину
     */
    public function removeAll()
    {
        $this->_cart['products'] = [];
        $this->save();

        return true;
    }

    /**
     * Общая стоимость товаров корзины
     */
    public function getCost()
    {
        $cost = 0;
        $cartModels = $this->_cart['products'];

        foreach ($cartModels as $hash => $cartModel) {
            $good = Good::findOne($cartModel['good_id']);
            if (empty($good)) {
                $this->delete($hash);
                continue;
            }
            $cost += $this->getGoodPrice($hash) * $cartModel['quantity'];
        }

        return $cost;
    }

    /**
     * Получить массив товаров из куки
     */
    public static function getArrayCart()
    {
        $array = [];
        if (isset($_COOKIE[self::DEFAULT_COOKIE_NAME])) {
            $array = json_decode($_COOKIE[self::DEFAULT_COOKIE_NAME], true)["products"];

        }
        return $array;
    }

    /**
     * Количество товара из куки
     */
    public function getCookieGoodCount($hash)
    {
        return $this->_cart['products'][$hash]['quantity'];
    }

    /**
     * Стоимость товара с учетом составляющих
     */
    public function getGoodPrice($hash)
    {
        $this->getAllProductModel();

        // Получаем данные товара из кук
        $good_id = $this->_cart['products'][$hash]['good_id'];
        $good = Good::find()->where(['id' => $good_id])->one();

        if (empty($good)) {
            $this->delete($hash);
            return;
        }

        $price = $good->price * $good->area;

        return (int)$price;
    }

    /**
     * Общее количество товаров в корзине
     */
    public function getCount()
    {
        $this->getAllProductModel();

        return !empty($this->_goods) ? count($this->_goods) : 0;
    }

    /**
     * Получить из кук
     */
    public function getProducts()
    {
        $this->getAllProductModel();

        return $this->_cart['products'];
    }

    /**
     * Получить готовые модели по куки
     */
    public function getFindedGoods()
    {
        $this->getAllProductModel();

        return $this->_goods;
    }

    /**
     * Получить модели товаров
     */
    public function getAllProductModel()
    {
        if (!empty($this->_models)) {
            return $this->_models;
        }

        $products = $this->_cart['products'];

        foreach ($products as $hash => $product) {
            $good = Good::find()->where(['id' => $product['good_id']])->one();
            $good->quantityInCart = $product['quantity'];
            $good->cartHash = $hash;

            $this->_models[] = $good;
            $this->_goods[] = $good;
        }

        return $this->_models;
    }

    /**
     * Сохранить в куки
     */
    private function save()
    {
        setcookie(self::DEFAULT_COOKIE_NAME, json_encode($this->_cart), time() + 3600 * 24 * 7, "/");  /* срок действия 1 неделя */
        return;
    }

    private function issetProduct($product)
    {
        $hash = $this->getHash($product);
        foreach ($this->_cart['products'] as $productInCart)
            return isset($productInCart[$hash]) ? true : false;
    }
}
