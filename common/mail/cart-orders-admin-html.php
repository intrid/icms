<?php
use common\models\Order;

$orderGoods = $modelOrder->orderGoods;
?>

<tr>
    <td>
        <p style="margin: 0 0 10px; padding: 0; font: 400 16px/19px Arial, sans-serif; -webkit-text-size-adjust: none; color: #313131;"><b>Заказ №</b> <?= $modelOrder->number ?></p>
        <p style="margin: 0 0 10px; padding: 0; font: 400 16px/19px Arial, sans-serif; -webkit-text-size-adjust: none; color: #313131;"><b>Сумма </b> <?= $modelOrder->sum_price_total ?>р</p>
        <p style="margin: 0 0 10px; padding: 0; font: 400 16px/19px Arial, sans-serif; -webkit-text-size-adjust: none; color: #313131;"><b>На имя</b> <?= $modelOrder->user_name ?></p>
        <p style="margin: 0 0 10px; padding: 0; font: 400 16px/19px Arial, sans-serif; -webkit-text-size-adjust: none; color: #313131;"><b>Телефон</b> <?= $modelOrder->user_phone ?></p>

        <?php if ($modelOrder->transport_type == "courier") : ?>
            <p style="margin: 0 0 10px; padding: 0; font: 400 16px/19px Arial, sans-serif; -webkit-text-size-adjust: none; color: #313131;"><b>Адрес доставки:</b> <?= $modelOrder->delivery_address ?></p>
        <?php else : ?>
            <?php $cityAddress = Order::getCityAddressById($modelOrder->city_id); ?>
            <p style="margin: 0 0 10px; padding: 0; font: 400 16px/19px Arial, sans-serif; -webkit-text-size-adjust: none; color: #313131;"><b>Адрес самовывоза:</b> <?= $cityAddress['city'] . ", " . $cityAddress['address'] ?></p>
        <?php endif; ?>
    </td>
</tr>
<tr>
    <td>
        <p style="margin: 5px 0 15px ; padding: 0; font: 700 18px/21px Arial, sans-serif; -webkit-text-size-adjust: none; text-align: center; color: #313131;">Товарные позиции</p>
    </td>
</tr>
<tr>
    <td>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" background="#fafafa" bgcolor="#fafafa" style="margin: 0 0 15px; padding: 0; border: 1px solid #ddd; border-bottom: none;">
            <tbody>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Наименование</th>
                        <th>Цена</th>
                        <th>Кол-во</th>
                    </tr>
                </thead>
                <?php $iterator = 1;
                foreach ($orderGoods as $orderGood) :
                    $goodModel = $orderGood->good;
                    $goodModelId = $goodModel->id;
                ?>
                    <tr>
                        <td style="padding: 5px; border-bottom: 1px solid #ddd;">
                            <span style="font: 700 14px/17px Arial, sans-serif; -webkit-text-size-adjust: none; color: #313131;">#<?= $iterator; ?></span>
                        </td>
                        <td style="padding: 5px; border-bottom: 1px solid #ddd;">
                            <span style="font: 400 14px/17px Arial, sans-serif; -webkit-text-size-adjust: none; color: #474442;"><?= $goodModel->nameForCard; ?></span>
                        </td>
                        <td style="padding: 5px; border-bottom: 1px solid #ddd;">
                            <span style="font: 400 14px/17px Arial, sans-serif; -webkit-text-size-adjust: none; color: #313131;"><?= Yii::$app->myHelper->getForntPrice($orderGood->price); ?>&nbsp;₽</span>
                        </td>
                        <td style="padding: 5px; border-bottom: 1px solid #ddd;">
                            <span style="font: 400 14px/17px Arial, sans-serif; -webkit-text-size-adjust: none; color: #313131;"><?= $orderGood->count; ?> (<?= $goodModel->area * $orderGood->count ?>)</span>
                        </td>
                    </tr>
                <?php $iterator++;
                endforeach; ?>
            </tbody>
        </table>
    </td>
</tr>