<?php

namespace backend\models\form;

use Yii;
use yii\base\Model;


class FormParseGoods extends Model {

    public $separator1, $separator2, $separator3, $separator4, $text;

    public function rules() {
        return [
            [['separator1', 'text'], 'required'],
            [['separator1', 'separator2','separator3','separator4','text'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'separator1' => 'Название товара',
            'separator3' => 'Синонимы название товаров (через ";")',
            'separator2' => 'Разделитель внутри харектеристики',
            'separator4' => 'После какого символа строку не проверять',
            'text' => 'Товары, каждый товар с новой строки',
        ];
    }

    
}
