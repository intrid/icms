<?php
namespace common\models\sphinx;


use common\models\sphinx\query\InlineGoodQuery;
use yii\sphinx\ActiveRecord;



class InlineGood extends ActiveRecord
{
    /**
     * @return string the name of the index associated with this ActiveRecord class.
     */

    public static function find() 
    {
        return new InlineGoodQuery( get_called_class() );
    }
    
    public static function indexName()
    {
        return 'flashbattery_full_goods_idx';
    }
}