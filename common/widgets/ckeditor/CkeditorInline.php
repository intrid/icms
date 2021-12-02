<?php

namespace common\components\widget\ckeditor;

use dosamigos\ckeditor\CKEditorInline as CK;
use yii\helpers\ArrayHelper;

class CkeditorInline extends CK {

       
    public function initOptions() {
        $this->clientOptions = ArrayHelper::merge($this->getCustom(), $this->clientOptions);
    }

    private function getCustom() {
        return [
            'contentsCss' => '/frontend/web/css/style.css',
            'allowedContent' => true,
            'height' => 300,
            'toolbar' => [
//                ['name' => 'document', 'items' => ['Source', 'Save','-']],
                ['name' => 'clipboard', 'items' => ['Undo', 'Redo']],
//                ['name' => 'editing', 'items' => ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt']],
                ['name' => 'basicstyles', 'items' => ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript']],
                ['name' => 'paragraph', 'items' => ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']],
//                ['name' => 'links', 'items' => ['Link', 'Unlink', 'Anchor']],
                ['name' => 'insert', 'items' => ['PageBreak']],
                ['name' => 'styles', 'items' => ['Format']],
                ['name' => 'colors', 'items' => ['TextColor', 'BGColor']],
                ['name' => 'tools', 'items' => ['ShowBlocks']],
            ],
        ];
    }

}
