<?php

use kartik\datecontrol\Module;

$config = [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'frontendCache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => Yii::getAlias('@frontend') . '/runtime/cache'
        ],
        'myHelper' => [
            'class' => 'common\components\MyHelper'
        ],
        'favorit' => [
            'class' => 'common\components\Favorit'
        ],
        'city' => [
            'class' => 'common\components\City'
        ],
        'changeOrder' => [
            'class' => 'common\components\ChangeOrder'
        ],

        'cart' => [
            'class' => 'yz\shoppingcart\ShoppingCart',
            'cartId' => 'my_application_cart',
        ],

        'compare' => [
            'class' => 'common\components\CompareComponent',
        ],
        'seoTemplate' => [
            'class' => 'frontend\component\SeoTemplateComponent'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'settings' => [
            'class' => 'pheme\settings\components\Settings'
        ],
        'i18n' => [
            'translations' => [
                'extensions/yii2-settings/*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en',
                    'basePath' => '@vendor/pheme/yii2-settings/messages',
                    'fileMap' => [
                        'extensions/yii2-settings/settings' => 'settings.php',
                    ],
                ]
            ],
        ],
        'urlManagerFrontend' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'baseUrl' => '/',
            'rules' => [
                '/' => 'site/index',
                '/polytic' => 'site/agreement',
                '/logout' => '/user/default/logout',

                '<slug>' => 'page/view',

                [
                    'class' => \frontend\component\PageRule::class,
                ],
                [
                    'class' => \frontend\component\ArticleRule::class,
                ],

            ],
        ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            // uncomment if you want to cache RBAC items hierarchy
            // 'cache' => 'cache',
        ],

        'telegram' => [
            'class' => 'aki\telegram\Telegram',
            'botToken' => '1925062508:AAE6Zt2rvEsuSSdAhfxucosFULagViHqdb0',
        ],


    ],
    'modules' => [
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            'imagesStorePath' => '../../files/images/store', //path to origin images
            'imagesCachePath' => '../../files/images/cache', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick' 
            'placeHolderPath' => '@app/../files/images/placeHolder.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
            'imageCompressionQuality' => 85, // Optional. Default value is 85.
            // 'waterMark' => '../../files/images/water.png',
        ],
        'settings' => [
            'class' => 'pheme\settings\Module',
            'sourceLanguage' => 'en'
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ],
        'datecontrol' => [
            'class' => 'kartik\datecontrol\Module',
            // format settings for displaying each date attribute (ICU format example)
            'displaySettings' => [
                Module::FORMAT_DATE => 'dd-MM-yyyy',
                Module::FORMAT_TIME => 'hh:mm:ss a',
                Module::FORMAT_DATETIME => 'dd-MM-yyyy hh:mm:ss a',
            ],
            // format settings for saving each date attribute (PHP format example)
            'saveSettings' => [
                Module::FORMAT_DATE => 'php:U', // saves as unix timestamp
                Module::FORMAT_TIME => 'php:H:i:s',
                Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
            ],
            // set your display timezone
            'displayTimezone' => 'Evropa/Moscow',
            // set your timezone for date saved to db
            'saveTimezone' => 'Europe/Moscow',
            // automatically use kartik\widgets for each of the above formats
            'autoWidget' => true,
            // default settings for each widget from kartik\widgets used when autoWidget is true
            'autoWidgetSettings' => [
                Module::FORMAT_DATE => ['type' => 2, 'pluginOptions' => ['autoclose' => true]], // example
                Module::FORMAT_DATETIME => [], // setup if needed
                Module::FORMAT_TIME => [], // setup if needed
            ],
            // custom widget settings that will be used to render the date input instead of kartik\widgets,
            // this will be used when autoWidget is set to false at module or widget level.
            'widgetSettings' => [
                Module::FORMAT_DATE => [
                    'class' => 'yii\jui\DatePicker', // example
                    'options' => [
                        'dateFormat' => 'php:d-M-Y',
                        'options' => ['class' => 'form-control'],
                    ]
                ]
            ]
        ],

    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['@'],
            'root' => [
                'baseUrl' => '',
                'basePath' => '@filesImage',
                'path' => '/files/images/upload',
                'name' => 'Files'
            ],
        ]
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment

    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}


return $config;
