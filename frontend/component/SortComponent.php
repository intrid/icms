<?php
namespace frontend\component;

use Yii;
use yii\base\Component;
use yii\db\ActiveRecord;



class SortComponent extends Component 
{

    const TYPE_SORT_PRICE = 'cost';
    const TYPE_SORT_PRICE_ASC = 'cost_asc'; //
    const TYPE_SORT_PRICE_DESC = 'cost_desc';
    const TYPE_SORT_NAME = 'name';
    const COOKIE_NAME = 'flash_sort';
    const TYPES_SORT = [
        self::TYPE_SORT_PRICE_ASC => 'Цена по возрастанию',
        self::TYPE_SORT_PRICE_DESC => 'Цена по убыванию',
        self::TYPE_SORT_NAME => 'По названию',
    ];


    private $sortOptions;

    public function __construct( $config = [] )
    {
        parent::__construct( $config );
    }

    public function init()
    {
        parent::init();

        $cookies = Yii::$app->request->cookies;
        $sort = json_decode( $cookies->getValue(self::COOKIE_NAME, '[]'), true );

        if ( empty( $sort ) ) {
            $this->sortOptions = $this->_instance();
        } else {
            $this->sortOptions = $sort;
        }
    }

    public function getSortOptions() 
    {
        return $this->sortOptions;
    }

    public function setSortName() 
    {
        $this->sortOptions['sort'] = self::TYPE_SORT_NAME;
    }

    public function setSortPrice() 
    {
        $this->sortOptions['sort'] = self::TYPE_SORT_PRICE;
    }
    
    public function setSortOrderDesc() 
    {
        $this->sortOptions['order'] = SORT_DESC;
    }

    public function setSortOrderAsc() 
    {
        $this->sortOptions['order'] = SORT_ASC;
    }

    public function setSortOptions( array $sortOptions = null )
    {
        $cookies = Yii::$app->response->cookies;

        $cookies->add(new \yii\web\Cookie([
            'name' => self::COOKIE_NAME,
            'value' => json_encode( $sortOptions ),
        ]));

        return $this;
    }

    protected function _instance() 
    {
        $this->setSortPrice();
        $this->setSortOrderDesc();

        return $this->sortOptions;
    }

}