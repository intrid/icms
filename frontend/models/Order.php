<?php

namespace frontend\models;

use common\models\goods\Good;
use common\models\OrderGoods;
use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $order_status
 * @property string $user_name
 * @property string $user_phone
 * @property int $city_id Город заказа
 * @property string $delivery_address
 * @property string $email
 * @property int $created_at
 * @property int $updated_at
 * @property string $json_data
 * @property string $sum_price_items Сумма стоимости товарных позиций
 * @property string $price_discount Сумма размера скидки
 * @property string $price_delivery Стоимость доставки
 * @property string $sum_price_total Сумма стоимости заказа
 * @property string $transport_type
 * @property int $payment_type
 * @property int $is_delete
 * @property string $user_id
 * @property string $comment
 * @property int $number
 * @property int $executed
 * @property int $executed_at
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_status', 'city_id', 'created_at', 'updated_at', 'payment_type', 'is_delete', 'user_id', 'number', 'executed', 'executed_at'], 'integer'],
            //[['user_name', 'city_id', 'email', 'created_at', 'updated_at', 'transport_type', 'payment_type', 'user_id'], 'required'],
            [['json_data', 'comment'], 'string'],
            [['sum_price_items', 'price_discount', 'price_delivery', 'sum_price_total'], 'number'],
            [['user_name', 'user_phone', 'delivery_address', 'email'], 'string', 'max' => 254],
            [['transport_type'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_status' => 'Order Status',
            'user_name' => 'User Name',
            'user_phone' => 'User Phone',
            'city_id' => 'City ID',
            'delivery_address' => 'Delivery Address',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'json_data' => 'Json Data',
            'sum_price_items' => 'Sum Price Items',
            'price_discount' => 'Price Discount',
            'price_delivery' => 'Price Delivery',
            'sum_price_total' => 'Sum Price Total',
            'transport_type' => 'Transport Type',
            'payment_type' => 'Payment Type',
            'is_delete' => 'Is Delete',
            'user_id' => 'User ID',
            'comment' => 'Comment',
            'number' => 'Number',
            'executed' => 'Executed',
            'executed_at' => 'Executed At',
        ];
    }


    public function saveOrder($cartForm)
    {
        $cart = Yii::$app->cart;

        if (Yii::$app->user->isGuest) {
            $userId = User::findOne(['email' => $cartForm['email']])->id;
        } else {
            $userId = Yii::$app->user->getId();
        }

        $this->user_name = $cartForm['name'];
        $this->order_status = 1;
        $this->user_phone = $cartForm['phone'];
        $this->city_id = 0; //voronej
        $this->delivery_address = "pr revolutsii";
        $this->email = $cartForm['email'];
        $this->created_at = time();
        $this->updated_at = time();
        $this->json_data = null;
        $this->sum_price_items = $cart->getCost();

        $this->price_discount = $cart->getCost() - $cart->getCost(true);
        $this->price_delivery = 500;
        $this->sum_price_total = $cart->getCost();
        $this->transport_type = "courier";
        $this->payment_type = 0;
        $this->is_delete = 0;
        $this->user_id = $userId;
        $this->comment = "comment";
        $this->executed = 0;
        $this->executed_at = null;


        if ($this->save()) {
            $goodsInCart = $cart->getPositions();
            //создаем позиции в товаре
            foreach ($goodsInCart as $good) {

                $orderGood = new OrderGoods();
                $orderGood->addGood($this->id, $good->id, $good->quantity, $good->size_id, $good->getCost());
            }
        }
        return true;
    }
}
