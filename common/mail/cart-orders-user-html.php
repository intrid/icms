<?php

use common\models\Good;
use common\models\Order;
use yii\helpers\Url;


$orderGoods = $modelOrder->orderGoods;
$city = $modelOrder->city;
$absoluteUrl = Url::to('/', true);
$logoUrl = Url::to('@web/img/logomail.png', true);


?>
<tr>
    <td>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" background="#474442" bgcolor="#474442" style="margin: 0 0 15px; padding: 10px;">
            <tbody>
                <tr>
                    <td>
                        <a href="<?= $absoluteUrl; ?>" title="<?= Yii::$app->name; ?>">
                            <img src="<?= $logoUrl; ?>" alt="" border="0" width="102px" height="52px&quot;" style="display: block; width: 102px; height: 52px; margin: 0 auto; padding: 0" />
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>
<tr>
    <td>
        <p style="margin: 0 0 10px; padding: 0; font: 400 16px/19px Arial, sans-serif; -webkit-text-size-adjust: none; color: #313131;"><b>Заказ</b> №<?= $modelOrder->number ?></p>
        <p style="margin: 0 0 10px; padding: 0; font: 400 16px/19px Arial, sans-serif; -webkit-text-size-adjust: none; color: #313131;"><b>На имя:</b> <?= $modelOrder->user_name ?></p>
        <p style="margin: 0 0 10px; padding: 0; font: 400 16px/19px Arial, sans-serif; -webkit-text-size-adjust: none; color: #313131;"><b>Ваш телефон:</b> <?= $modelOrder->user_phone ?></p>
        <?php if ($modelOrder->transport_type == "courier") : ?>
            <p style="margin: 0 0 10px; padding: 0; font: 400 16px/19px Arial, sans-serif; -webkit-text-size-adjust: none; color: #313131;"><b>Адрес доставки:</b> <?= $modelOrder->delivery_address ?></p>
        <?php else : ?>
            <?php $cityAddress = Order::getCityAddressById($modelOrder->city_id); ?>
            <p style="margin: 0 0 10px; padding: 0; font: 400 16px/19px Arial, sans-serif; -webkit-text-size-adjust: none; color: #313131;"><b>Адрес самовывоза:</b> <?= $cityAddress['city'] . ", " . $cityAddress['address'] ?> </p>
        <?php endif; ?>
        <?php if (!empty($modelOrder->comment)) : ?>
            <p style="margin: 0 0 10px; padding: 0; font: 400 16px/19px Arial, sans-serif; -webkit-text-size-adjust: none; color: #313131;"><b>Комментарий к заказу:</b> <?= $modelOrder->comment ?></p>
        <?php endif; ?>
    </td>
</tr>
<tr>
    <td>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" background="#fafafa" bgcolor="#fafafa" style="margin: 0 0 15px; padding: 0; border: 1px solid #ddd; border-bottom: none;">
            <thead>
                <tr>
                    <th style="padding: 5px; border-bottom: 1px solid #ddd;">#</th>
                    <th style="padding: 5px; border-bottom: 1px solid #ddd;">Название</th>
                    <th style="padding: 5px; border-bottom: 1px solid #ddd;">Цена за шт.</th>
                    <th style="padding: 5px; border-bottom: 1px solid #ddd;">Кол-во</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($orderGoods as $orderGood) : $good = $orderGood->good; ?>
                    <tr>
                        <td style="padding: 5px; border-bottom: 1px solid #ddd;">
                            <span style="font: 700 14px/17px Arial, sans-serif; -webkit-text-size-adjust: none; color: #313131;"><?= $i; ?></span>
                        </td>
                        <td style="padding: 5px; border-bottom: 1px solid #ddd;">
                            <?php if ($good instanceof Good) : ?>
                                <a style="font: 400 14px/17px Arial, sans-serif; -webkit-text-size-adjust: none; color: #474442;" href="<?= Url::to(['/'], true) ?>"><?= $good->name ?></a>
                            <?php else : ?>
                                <span style="font: 400 14px/17px Arial, sans-serif; -webkit-text-size-adjust: none; color: #474442;"><?= $good->nameForCard; ?></span>
                            <?php endif; ?>
                        </td>
                        <td style="padding: 5px; border-bottom: 1px solid #ddd;">
                            <span style="font: 400 14px/17px Arial, sans-serif; -webkit-text-size-adjust: none; color: #313131;"><?= \Yii::$app->myHelper->getForntPrice($orderGood->price); ?>&nbsp;₽</span>
                        </td>
                        <td style="padding: 5px; border-bottom: 1px solid #ddd;">
                            <span style="font: 400 14px/17px Arial, sans-serif; -webkit-text-size-adjust: none; color: #313131;"><?= $orderGood->count; ?> (<?= $good->area * $orderGood->count ?>)</span>
                        </td>
                    </tr>
                <?php $i++;
                endforeach; ?>
            </tbody>
        </table>
    </td>
</tr>
<tr>
    <td>
        <?php if ($modelOrder->transport_type == 'courier') : ?>
            <p style="text-align:right; margin: 0 0 10px; padding: 0; font: 400 16px/19px Arial, sans-serif; -webkit-text-size-adjust: none; color: #313131;">Стоимость доставки: <?= \Yii::$app->myHelper->getForntPrice($modelOrder->price_delivery); ?>&nbsp;₽</p>
        <?php endif; ?>
        <p style="text-align:right;  margin: 0 0 10px; padding: 0; font: 400 16px/19px Arial, sans-serif; -webkit-text-size-adjust: none; color: #313131;">Итого: <?= \Yii::$app->myHelper->getForntPrice($modelOrder->sum_price_total); ?>&nbsp;₽</p>
    </td>
</tr>
<tr>
    <td>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" background="#474442" bgcolor="#474442" style="margin: 0; padding: 10px;">
            <tbody>
                <tr>
                    <td>
                        <img src="<?= $logoUrl; ?>" alt="" border="0" width="102px" height="52px&quot;" style="display: block; width: 102px; height: 52px; margin: 0 10px 0 0; padding: 0" />
                    </td>
                    <td>
                        <p style="margin: 0 0 5px; padding: 0; font: 400 16px/19px Arial, sans-serif; -webkit-text-size-adjust: none; color: #fff;">
                            Телефон:
                            <a href="tel:<?= Yii::$app->settings->get('Settings.phone'); ?>" style="font: 400 16px/19px Arial, sans-serif; -webkit-text-size-adjust: none; color: #fff;"><?= Order::getPhoneCityDelivery() ?></a>
                        </p>
                        <p style="margin: 0 0 5px; padding: 0; font: 400 14px/19px Arial, sans-serif; -webkit-text-size-adjust: none; color: #fff;"><?= Yii::$app->name; ?> © <?= date('Y. г'); ?> Все права защищены.</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>