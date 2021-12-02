<?php
namespace common\models\sphinx\query;


use yii\sphinx\ActiveQuery;
use yii\sphinx\Query;
use yii\db\Expression;
use yii\sphinx\MatchExpression;
use common\models\sphinx\InlineGood;

class InlineGoodQuery extends ActiveQuery
{

    public function __construct( $fullDescriptionGood )
    {
        parent::__construct( $fullDescriptionGood, [] );
    }

    public function getGoodsIds(): Query
    {

        $query = new Query();
        $query->select('id')
            ->from('flashbattery_full_goods_idx')
            ->limit( 1000 );

        return $query;
    }


    public function matchGoods( array $matches = null ) 
    {
        $query = ( new Query() )
            ->select('*')
            ->from('flashbattery_full_goods_idx')
            ->limit( 1000 )
            ->showMeta( true )
        ;
        $expression = new MatchExpression();

        if ( ! empty( $matches ) ) {
            foreach ( $matches as $k => $v ) {
                $expression->andMatch([$k => $v]);
            }
        }

        $query->match( $expression );

        return $query;
    }

    public function rangeProperty( $propertyName, array $goodsIds = null ): array
    {
        $query = ( new Query() )
            ->select( new Expression("MAX({$propertyName}) as max, MIN({$propertyName}) as min ") )
            ->from('flashbattery_full_goods_idx')
            ->limit( 1000 )
            ->andFilterWhere(['good.id' => $goodsIds])
            ->one()
        ;

        var_dump( $query );

        return [];
    }

    public function maxPropertyValue( $propertyName, array $goodsIds = null ) 
    {
    }
    public function minPropertyValue( $propertyName, array $goodsIds = null ) 
    {
    }

}