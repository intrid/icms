<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/854.css',
        'css/main.css',
        'css/custom.css',
    ];
    public $js = [
        'js/854.js',
        'js/main.js',
        'js/custom.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset'
    ];

    public $jsOptions = [
        'position' => View::POS_END,
    ];
}
