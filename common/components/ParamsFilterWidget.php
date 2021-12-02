<?php
namespace common\components;


use Yii;
use yii\base\Widget;


class ParamsFilterWidget extends Widget
{
    public $searchModel;

    private $polarities,
            $brands,
            $countries,
            $storageBatterieRange,
            $flowRange,
            $warrantyRange,
            $sizeLRange,
            $sizeWRange,
            $sizeHRange,
            $costRange;

    private $path;
    

    public function init()
    {
        parent::init();

        $this->path = Yii::$app->request->pathinfo;

        $this->polarities = $this->searchModel->getPolaritiesForSelect();
        $this->brands = $this->searchModel->getBrandsForSelect();
        $this->countries = $this->searchModel->getCountriesForSelect();
        $this->storageBatterieRange = $this->searchModel->getStorageBatterieRange();
        $this->flowRange = $this->searchModel->getFlowRange();
        $this->warrantyRange = $this->searchModel->getWarrantyRange();
        $this->sizeLRange = $this->searchModel->getSizeLRange();
        $this->sizeWRange = $this->searchModel->getSizeWRange();
        $this->sizeHRange = $this->searchModel->getSizeHRange();
        $this->costRange = $this->searchModel->getCostRange();
    }

    public function run()
    {  
        $tempalte = '';

        if ( empty( $this->path ) 
            || $this->path == 'podbor-akb'
        ) {
            $tempalte = 'params-filter/view';    
        } else {
            $tempalte = 'params-filter/view-catalogue';  
        }

        return $this->render(
            $tempalte, 
            [
                'searchModel' => $this->searchModel,
                'polarities' => $this->polarities,
                'brands' => $this->brands,
                'countries' => $this->countries,
                'storageBatterieRange' => $this->storageBatterieRange,
                'flowRange' => $this->flowRange,
                'warrantyRange' => $this->warrantyRange,
                'sizeLRange' => $this->sizeLRange,
                'sizeWRange' => $this->sizeWRange,
                'sizeHRange' => $this->sizeHRange,
                'costRange' => $this->costRange,
            ]
        );
    }

}
?>