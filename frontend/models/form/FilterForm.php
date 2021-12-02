<?php

namespace frontend\models\form;

use common\models\Actions;
use common\models\goods\Good;
use common\models\Sex;
use common\models\Sizes;
use common\models\Brands;
use common\models\Ages;
use yii\base\Model;

/**
 * Фильтр товаров по заданным параметрам
 */
class FilterForm extends Model
{
	// public $priceMinToSearch;
	// public $priceMaxToSearch;
	// public $sizesToSearch;
	// public $brandsToSearch;
	// public $agesToSearch;
    // public $actionsToSearch;
    // ...

    public function rules()
    {
		return [
			[['priceMinToSearch', 'priceMaxToSearch'], 'integer', 'min' => 0],
			[['sizesToSearch', 'brandsToSearch', 'agesToSearch'], 'string', 'max' => 255],
		];
	}

	public function getPriceMin()
    {
        return Good::find()->min('price');
    }

	public function getPriceMax()
    {
        return Good::find()->max('price');
    }

    public function getSizes()
    {
        return Sizes::find()->orderBy('name')->all();
    }

	public function getBrands()
    {
        return Brands::find()->orderBy('name')->all();
    }

	public function getAges()
    {
        return Ages::find()->orderBy('name')->all();
    }

    public function getSex()
    {
        return Sex::find()->orderBy('name')->all();
    }

	public function getActions()
    {
        return Actions::find()->orderBy('name')->all();
    }

}