<?php
namespace backend\models\form;


use Yii;
use yii\base\Model;


class GoodPriceListForm extends Model 
{
    public $priceFile;

    public function rules()
    {
        return [
            [['priceFile'], 'file', 'skipOnEmpty' => false, 'checkExtensionByMimeType' => false, 'extensions' => ['csv']],
        ];
    }

    public function upload()
    {
        $path = Yii::getAlias('@filesImage/files/prices');
        if ( $this->validate() ) {
            $this->priceFile->saveAs( $path .'/' . $this->priceFile->baseName . '.' . $this->priceFile->extension );

            return true;
        }

        return false;
    }
}
?>