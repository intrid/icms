<?php

namespace common\components\Cart;

use Yii;
use common\models\goods\Good;
use common\models\Order;


/*
  id товара артикуль+название+id в базе
 */

class Cart extends \yii\base\Component 
{
    const CONST_ID_CART = 'cart_strongman';
    const CATALOGUE_KEY_CART = 'goods';
    const PRICE_KEY_CART = 'goodsPrice';

    private $cart;
    private $cartIdentity;

    public $goodsClass;

    public $goodPriceClass;
    public $id;
    public $count;
    public $cartId;
    public $size;

    /*
     * корзина
     * товары
     *  -id товара
     *      - модель товара
     *      - количество товара
     * общее кол-во товара
     *      
     */

    public function __construct() 
    {


        parent::__construct();

        $this->setNameCart();



        $this->cartIdentity = [
            self::CATALOGUE_KEY_CART => [],
            self::PRICE_KEY_CART => [],
            'count' => 0,
            'countModel' => 0,
            'timeStart' => date('d.m.Y m:i:s'),
            'cartInfo' => [],
            'timeStartSave' => 0,
            'totalPrice' => 0,
            'totalSale' => 0,
            'totalPriceWithSale' => 0,
            'typeDelivery' => 'shop',
            'priceDelivery' => 0,
        ];


    }

    public function add( $id, $count, $size )
    {
        $this->goodsClass="common\models\goods\Good";


        $this->id = $id;


        $this->count = $count;
        $this->size = $size;

        if (!$this->validate()) {
            return false;
        }

        $model = $this->goodsClass::isGood( $id );



        if ( ! empty( $model ) ) {

            $this->setGoods( $id, (int) $count, $model ,$size);
            return true;
        }
        return false;
    }

    public function addPriceGood( $id, $count ) 
    {
        $this->goodsClass="common\models\goods\Good";


        $this->id = $id;
        $this->count = $count;

        if (!$this->validate()) {
            return false;
        }

        $model = $this->goodPriceClass::isGood( $id );

        if ( ! empty( $model ) ) {
            $this->setGoodPrice( $id, $count, $model );
            return true;
        }
        return false;
    }

    /*
     * Задает новое значение кол-во товара в корзине
    */
    public function setGoods( $id, $count, $model ,$size)
    {

        $this->goodsClass="common\models\goods\Good";


        if ( ! $this->validate() ) {
            return $this->returnFalse();
        }

        $this->id = $id;
        $this->count = $count;



        $cart = $this->getCart();



        //походу если есть в корзине
        if ( $this->hasGoods( $id ) ) {
            $currentCount = $cart[self::CATALOGUE_KEY_CART][$id]['count'];

            $issue = $count - $currentCount;
            $issueAbs = abs( $issue );

            //Прибавляем разницу. Если разница отрицательная - идёт уменьшение кол-ва
            if ( $issueAbs == 1 ) {
                $cart[self::CATALOGUE_KEY_CART][$id]['count'] += $issue; 
            } else {
                //Абсолютное значение > 1, Нажатие кнопки в корзину или ввод кол-ва в корзине
                $cart[self::CATALOGUE_KEY_CART][$id]['count'] += $count;
            }





            //если запросы был отправлен со страницы корзины, то установить переданное количество товара


            if (isset($_POST['set_count'])){
                $cart[self::CATALOGUE_KEY_CART][$id]['size'][$size]  =  $count;

            }
            else{//добавить к текущему количеству
                if (isset($cart[self::CATALOGUE_KEY_CART][$id]['size'][$size])){
                    $cart[self::CATALOGUE_KEY_CART][$id]['size'][$size]  =  $count+$cart[self::CATALOGUE_KEY_CART][$id]['size'][$size];
                }else{
                    $cart[self::CATALOGUE_KEY_CART][$id]['size'][$size] = $count;
                }
            }



            $commonCount=0;

            foreach ($cart[self::CATALOGUE_KEY_CART] as $value) {
                if (is_array($value)) {
                    foreach ($value as $val) {
                        if (is_array($val)) {
                            foreach ($val as $v) {
                                $commonCount += $v;
                            }
                        }
                    }
                }
            }

            $cart['count'] = $commonCount;

            $cart['totalPrice'] =$model->price*$commonCount;



//походу если нет в корзине
        } else {


            $cart[self::CATALOGUE_KEY_CART][$id] = [
                'size' =>[ (int) $this->size=>$count],
                'count' => (int) $count,
//                'totalPrice' => $model->price * $count,
            ];

            $cart['countModel'] = $cart['countModel'] + 1;
            $cart['count'] += $count;
            $cart['totalPrice'] +=$model->price*$count;
        }




        $this->cart = $cart;
//        $this->resetTotalPrice();
//        $this->resetTotalCount();
//        $this->setPriceDelivery();
        $this->setCart();


        return $this;
    }

    public function setGoodPrice( $id, $count, $model ) 
    {

        $this->goodsClass="common\models\goods\Good";



        $this->id = $id;
        $this->count = $count;

        if ( ! $this->validate() ) {
            return $this->returnFalse();
        }

        $cart = $this->getCart();
        
        if ( $this->hasGoodPrice( $id ) ) {
            $c = $cart[self::PRICE_KEY_CART][$id]['count'];
            $cart[self::PRICE_KEY_CART][$id]['count'] = $count;
            $cart['count'] = $cart['count'] - $c + $count;
            $cart[self::PRICE_KEY_CART][$id]['totalPrice'] = $cart[self::PRICE_KEY_CART][$id]['count'] * $model->price;
        } else {
            $cart[self::PRICE_KEY_CART][$id] = [
                'count' => $count,
                'totalPrice' => $model->price * $count
            ];

            $cart['countModel'] = $cart['countModel'] + 1;
        }

        $this->cart = $cart;
        $this->setCart();
        $this->resetTotalPrice();
        $this->setPriceDelivery();

        return $this;
    }

    public function setSale( $goodId, $sale = true )
    {
        $good = $this->getGoodsById( $goodId );
        if ( $good != false ) {
            $good['isSale'] = $sale;

            if ( $sale == true ) {
                $goodModel = $this->goodsClass::findOne( $goodId );
                $saleValue = $goodModel->getSaleValue();
                $saleCost = (  $saleValue * $good['count'] );
                $good['saleTotalPrice'] = $good['totalPrice'] - $saleCost;

            } else {
                $good['saleTotalPrice'] = 0;
            }

            $this->cart[self::CATALOGUE_KEY_CART][$goodId] = $good;

            $this->resetTotalPrice();
            $this->setPriceDelivery();
            $this->setCart();

            return true;
        }

        return false;
    }

    public function setCart() 
    {

        $this->goodsClass="common\models\goods\Good";


        if ( ! empty( $this->cart ) ) {
            $cookies = Yii::$app->response->cookies;
            $cookies->add(new \yii\web\Cookie([
                'name' => self::CONST_ID_CART,
                'value' => json_encode( $this->cart ),
            ]));
        }

        return $this;
    }

    public function getCart() 
    {

        $this->goodsClass="common\models\goods\Good";


        if ( empty( $this->cart ) ) {

            $cookies = Yii::$app->request->cookies;
            $cart = json_decode( $cookies->getValue( self::CONST_ID_CART ), true );

            if ( ! empty( $cart ) ) {
                $solt = '$_KDSG0_as4)(%8';
                $hash = md5( implode( array_keys( $this->cartIdentity ) ) . $solt );

                if ( ! isset( $cart['hash'] ) 
                    || $cart['hash'] != $hash
                ) {
                    $this->initCart();
                } else {
                    $this->cart = $cart;
                }

            } else {
                $this->initCart();
            }
        }

        return $this->cart;
    }

    public function getCount() 
    {

        $this->goodsClass="common\models\goods\Good";


        $cart = $this->getCart();

        return $cart['count'];
    }


    public function getCountOneGood($id,$size)
    {

        $this->goodsClass="common\models\goods\Good";


        $cart = $this->getCart();

        return $cart['goods'][$id]['size'][$size];
    }



    public function getTotalCount() 
    {

        $this->goodsClass="common\models\goods\Good";


        $cart = $this->getCart();

        return  $cart['count'];
    }

    public function resetTotalCount() 
    {

        $this->goodsClass="common\models\goods\Good";

        $cart = $this->getCart();

        $totalCount = 0;



        foreach ( $cart[self::CATALOGUE_KEY_CART] as $item ) {

            foreach ( $item['size'] as $subItem ) {


                $totalCount += $subItem;
            }

        }

//        foreach ( $cart[self::PRICE_KEY_CART] as $item ) {
//            $totalCount += $item['count'];
//        }

        $cart['count'] = $totalCount;
        $this->cart = $cart;
        $this->setCart();
    }

    public function getModels() 
    {
        $cart = $this->getCart();

        return $cart[self::CATALOGUE_KEY_CART];
    }

    public function getPriceModels() 
    {
        $cart = $this->getCart();

        return $cart[self::PRICE_KEY_CART];
    }

    public function getCartWithGoodsModels() 
    {
        $cartModels = $this->getModels();
        $cartPriceModels = $this->getPriceModels();

        if ( ! empty( $cartModels ) ) {
            $goodsModels = $this->goodsClass::find()->where(['in','id', array_keys( $cartModels )])->all();
        
            foreach ( $goodsModels as $good ) {
                $this->setCartGoods( $good->id, $good );
            }
        }

        if ( ! empty( $cartPriceModels ) ) {
            $goodsPriceModels = $this->goodPriceClass::find()->where(['in','id', array_keys( $cartPriceModels )])->all();
        
            foreach ( $goodsPriceModels as $good ) {
                $this->setCartGoodsPrice( $good->id, $good );
            }
        }
        
        return $this->cart;
    }

    /*
     * Удаление товара из корзины
     */

    public function delete( $id ,$size)
    {
        $this->id = $id;

        if (!$this->validate()) {
            return $this->returnFalse();
        }

        $cart = $this->getCart();



        if ( $this->hasGoods( $id ) ) {

            $cart['count'] -= $cart[self::CATALOGUE_KEY_CART][$id]['size'][$size];

            $totalPrice =  $cart[self::CATALOGUE_KEY_CART][$id]['good']['price']*$cart[self::CATALOGUE_KEY_CART][$id]['size'][$size];

            $cart['totalPrice'] -= $totalPrice;

            if (count($cart[self::CATALOGUE_KEY_CART][$id]['size'])===1){
                unset( $cart[self::CATALOGUE_KEY_CART][$id]);
            }
            else{
                unset($cart[self::CATALOGUE_KEY_CART][$id]['size'][$size]);
            }








            $this->cart = $cart;
        }


        $this->cart = $cart;
        $this->setCart();
//        $this->resetTotalPrice();
//        $this->setPriceDelivery();
        
        return $this;
    }

    public function deletePrice( $id ) 
    {
        $this->id = $id;

        if (!$this->validate()) {
            return $this->returnFalse();
        }

        $cart = $this->getCart();

        if ( $this->hasGoodPrice( $id ) ) {

            $cart['count'] = $cart['count'] - $cart[self::PRICE_KEY_CART][$id]['count'];

            $cart['countModel'] -= 1;

            unset( $cart[self::PRICE_KEY_CART][$id] );

            $this->cart = $cart;
        }

        $this->cart = $cart;
        $this->setCart();
        $this->resetTotalPrice();
        $this->setPriceDelivery();
        
        return $this;
    }

    public function resetTotalPrice()
    {
        $cart = $this->getCart();
        $totalPrice = 0;
        $totalSale = 0;

        if ( ! empty( $cart[self::CATALOGUE_KEY_CART] ) ) {
            foreach ( $cart[self::CATALOGUE_KEY_CART] as $good_id => $value ) {
                
                if( isset( $value['totalPrice'] ) ) {
                    $totalPrice += $value['totalPrice'];
                }

                if ( isset( $value['saleTotalPrice'] ) 
                    && $value['saleTotalPrice'] > 0 
                ) {
                    //$saleTotalPrice += $value['saleTotalPrice']; // цена товаров со скидкой
                    $totalSale +=  ( $value['totalPrice'] - $value['saleTotalPrice'] );//Считаем размер скидки
                }

                
            }
        }

        if ( ! empty( $cart[self::PRICE_KEY_CART] ) ) {
            foreach ( $cart[self::PRICE_KEY_CART] as $key => $value ) {
                if( isset( $value['totalPrice'] ) ) {
                    $totalPrice += $value['totalPrice'];
                }
            }
        }
        
        $cart['totalPrice'] = $totalPrice + $cart['priceDelivery'];
        $cart['totalSale'] = $totalSale;
        $cart['totalPriceWithSale'] = 0;
        if ( $totalSale > 0 ) {
            $cart['totalPriceWithSale'] =  $cart['totalPrice'] - $cart['totalSale'];
        }

        $this->cart = $cart;
        $this->setCart();



        return $this;
    }

    public function getGoodsById($id) 
    {
        if ($this->hasGoods($id)) {
            return $this->cart[self::CATALOGUE_KEY_CART][$id];
        }
        return false;
    }

    public function clearCart()
    {
        $this->destroyCart();
    }

    public function addCartInfo($model) 
    {
        $cart = $this->getCart();
        $cart['cartInfo'] = $model;

        $this->cart = $cart;
        //$this->setCart(); //В куку не нужно записывать форму корзины(данные заказчика) 
    }

    public function saveOrders()
    {
        if ( $this->timeStastSave() ) {
            $order = $this->goodsClass::saveOrder( $this->cart );
            
            return $order;
        }
        
        return false;
    }

    public function timeStastSave() 
    {
        $cart = $this->getCart();
        
        if ($cart['timeStartSave'] == 0) {
            $cart['timeStartSave'] = time();
            $this->cart = $cart;
            $this->setCart();

            return true;
        } else {
            return ((time() - $cart['timeStartSave']) > 20);
        }
    }

    public function getTotalPrice()
    {
        $cart = $this->getCart();

        return $cart['totalPrice'];
    }

    public function getTotalSale()
    {
        $cart = $this->getCart();

        return $cart['totalSale'];
    }

    public function getTotalPriceWithSale() 
    {
        return ( $this->getTotalPrice() - $this->getTotalSale() );
    }

    public function getPriceDelivery()
    {
        return $this->cart['priceDelivery'];   
    }

    private function setPriceDelivery() 
    {
        $cart = $this->getCart();
        $typeDelivery = $this->getTypeDelivery();

        $minPriceTotalFreeDeliveryVrn = (int) Yii::$app->settings->get( 'Settings.minPriceTotalFreeDeliveryVrn' );
        $priceDeliveryVrn = (int) Yii::$app->settings->get( 'Settings.priceDeliveryVrn' );
        $priceDelivery = 0;

        if( $typeDelivery == 'courier' ) {
            $totalPriceWithoutDel = Yii::$app->cart->getTotalPriceNotDelivery();

            if ( $totalPriceWithoutDel < $minPriceTotalFreeDeliveryVrn  ) {
                $priceDelivery = $priceDeliveryVrn;
            }
        }

        $cart['priceDelivery'] = $priceDelivery;
        $this->cart = $cart;
        
        $this->resetTotalPrice();
        $this->setCart();

        return $this;
    }

    public function getTotalPriceNotDelivery()
    {
        $cart = $this->getCart();

        return $cart['totalPrice'] - $cart['priceDelivery'];
    }

    public function setTypeDelivery( $type )
    {
        $cart = $this->getCart();
        $cart['typeDelivery'] = $type;
        $this->cart = $cart;

        $this->setPriceDelivery();

        return $this;
    }

    public function getTypeDelivery() 
    {
        $cart = $this->getCart();

        return $cart['typeDelivery'];
    }

    /*
        КОСТЫЛЬ!!!
    */
    public function startPageIndexCart()
    {
        Yii::$app->cart->setTypeDelivery('shop')->setPriceDelivery()->resetTotalPrice();
    }

    private function hasGoods($id) 
    {
        $cart = $this->getCart();

        $goods = $cart[self::CATALOGUE_KEY_CART];
        return isset( $goods[$id] );
    }

    private function hasGoodPrice($id) 
    {
        $cart = $this->getCart();

        $goods = $cart[self::PRICE_KEY_CART];
        return isset( $goods[$id] );
    }

    private function returnFalse() 
    {
        return[
            'status' => false
        ];
    }

    private function validate() 
    {
        if (!empty($this->id)) {
            if (!is_numeric($this->id))
                return false;
        }
        if (!empty($this->count)) {
            if (!is_numeric($this->count)) {
                return false;
            }
            if ($this->count < 0) {
                $this->count = ($this->count * (-1));
            }
            if ($this->count == 0) {
                $this->count = 1;
            }
        }
        return true;
    }

    private function destroyCart() 
    {
        $this->initCart();
    }

    private function setNameCart() 
    {
        $this->cartId = $this->cartId ?? self::CONST_ID_CART;
    }

    private function initCart() 
    {
        $this->cart = $this->cartIdentity;
        $solt = '$_KDSG0_as4)(%8';
        $hash = md5( implode( array_keys( $this->cartIdentity ) ) . $solt );
        $this->cart['hash'] = $hash;

        $cookies = Yii::$app->response->cookies;
        $cookies->add(new \yii\web\Cookie([
            'name' => self::CONST_ID_CART,
            'value' => json_encode( $this->cart ),
        ]));

    }

    private function setCartGoods($id, $model ) 
    {
        $cart = $this->getCart();
        $cart[self::CATALOGUE_KEY_CART][$id]['model'] = $model;
        $this->cart = $cart;

        return $this;
    }

    private function setCartGoodsPrice( $id, $model ) 
    {
        $cart = $this->getCart();
        $cart[self::PRICE_KEY_CART][$id]['model'] = $model;
        $this->cart = $cart;

        return $this;
    }
}
