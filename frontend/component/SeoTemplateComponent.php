<?php
namespace frontend\component;

use Yii;
use yii\base\Component;
use yii\db\ActiveRecord;



class SeoTemplateComponent extends Component 
{
    private $templates;
    public $templatesValues;

    public function __construct( $config = [] )
    {
        parent::__construct( $config );

        $this->templates = [
            'name',
            'cost',
            'city',
            'brand',
            'category',
        ];
    }   

    public function init()
    {
        parent::init();
    }

    public function prepareSeoString( ActiveRecord $record, $str ) 
    {
        $pattern = '/\{\$\w+\}/';

        $str = preg_replace_callback( 
            $pattern, 
            function( $matches ) use ( $record ) {
                $attribute = trim( $matches[0], '{$}' );
                if ( ! empty( $record->{ $attribute } ) ) {
                    return $record->{ $attribute };
                }
            },
            $str
        );

        return $str;
    }

    public function prepareSectionField( \common\models\SeoSection $seoSection, $sectionAttribute, $param, $value )
    {
        $pattern = "/\{\\\${$param}\}/";

        $str = preg_replace_callback( 
            $pattern, 
            function( $matches ) use ( $param, $value ) {
                $p  = trim( $matches[0], '{$}' );
                if ( $p == $param ) {
                    return $value;
                }
            },
            $seoSection->{ $sectionAttribute }
        );


        $seoSection->{ $sectionAttribute } = $str;

        return $this;
    }
}