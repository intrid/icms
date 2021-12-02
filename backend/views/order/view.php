<?php

use common\models\OrderGoods;
use common\models\Good;
use common\models\Order;
use common\models\GoodPricelist;
use yii\helpers\Html;
use yii\helpers\Url;


?>
<div class="order-view">
    <div class="row">
        <div class="col-sm-6">
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body" data-order-describe="true" data-id="<?= $model->id; ?>">
                    <br>
                    <table class="table table-bordered table-striped kv-table-wrap" data-order-describe="true">

                        <tr>
                            <td colspan="2"><b>Информация о доставке</b></td>
                        </tr>
                        <tr>
                            <td>Способ доставки</td>
                            <td><?= $model->getTypeDelivery() ?></td>
                        </tr>

                        <?php if ($model->transport_type == "courier") : ?>
                            <tr>
                                <td>Адрес</td>
                                <td><?= $model->delivery_address; ?></td>
                            </tr>
                        <?php else : ?>
                            <tr>
                                <td>Пункт самовывоза</td>
                                <?php $cityAddress = Order::getCityAddressById($model->city_id); ?>
                                <td><?= $cityAddress['city'] . ", " . $cityAddress['address'] ?></td>
                            </tr>
                        <?php endif; ?>

                        <tr>
                            <td colspan="2"><b>Информация о получателе</b></td>
                        </tr>
                        <tr>
                            <td>Имя</td>
                            <td><?= $model->user_name; ?></td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td><?= $model->email; ?></td>
                        </tr>

                        <tr>
                            <td>Телефон</td>
                            <td><?= $model->user_phone; ?></td>
                        </tr>

                        <tr>
                            <td>Дополнительная информация</td>
                            <td><?= $comment = !empty($model->comment) ? $model->comment : 'Нет' ?></td>
                        </tr>

                        <tr>
                            <td colspan="2"><b>Состояние заказа</b></td>
                        </tr>

                        <tr>
                            <?php if ($model->payment_type == 0) : ?>

                                <td>Статус оплаты (онлайн)</td>
                                <td><?=$model->statusOnlinePaykeeper?></td>

                            <?php else : ?>

                                <td>Статус оплаты (при получении)</td>
                                <td data-order-exec="true">
                                    <select name="" id="Order-order-status-pay-<?= $model->id ?>">
                                        <?php
                                        foreach (Order::getListForSelectStatusPay() as $k => $v) :
                                            $selected = '';
                                            if ($model->payment_status == $k) {
                                                $selected = 'selected';
                                            }
                                        ?>
                                            <option value="<?= $k; ?>" <?= $selected; ?>><?= $v; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <button class="g-btn pull-right" data-action="<?= Url::to(['order/set-status-pay']); ?>" data-key="<?= $model->id; ?>">Применить</button>
                                </td>

                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td>Статус</td>
                            <td data-order-exec="true">
                                <select name="" id="Order-order-status-<?= $model->id ?>">
                                    <?php

                                    foreach (Order::getListForSelectStatusOrder() as $k => $v) :
                                        $selected = '';
                                        if ($model->order_status == $k) {
                                            $selected = 'selected';
                                        }
                                    ?>
                                        <option value="<?= $k; ?>" <?= $selected; ?>><?= $v; ?></option>
                                    <?php endforeach; ?>
                                </select>

                                <button class="g-btn pull-right" data-action="<?= Url::to(['order/set-status']); ?>" data-key="<?= $model->id; ?>">Применить</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped kv-table-wrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Название</th>
                                <th>Кол-во</th>
                                <th>Стоимость (₽)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($model->orderGoods as $orderGood) :
                                $good = $orderGood->good;

                                $href = "";
                                if ($good instanceof Good) {
                                    $href = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['/category/view-product', 'id' => $good->id]);
                                } else if ($good instanceof GoodPricelist) {
                                    $href = Url::to(['good-price-list/index', 'GoodPriceList[name]' => $good->name]);
                                }
                            ?>
                                <?php if(!empty($orderGood->good)):?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><a href="<?= $href ?>" data-pjax="0" target="_blank"><?= $good->nameForCard ?></a></td>

                                    <td>
                                        <?= $orderGood->count ?>шт. (<?= $good->area * $orderGood->count ?>)
                                    </td>
                                    <td>
                                        <?= number_format($orderGood->price * $orderGood->count, 0, '.', ' '); ?>
                                    </td>
                                </tr>
                                <?php endif;?>
                            <?php
                                $i++;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>