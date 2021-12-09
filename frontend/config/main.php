<?php

$params = array_merge(
        require __DIR__ . '/../../common/config/params.php', 
        require __DIR__ . '/../../common/config/params-local.php',
         require __DIR__ . '/params.php', 
         require __DIR__ . '/params-local.php'
);
$common_config = require(__DIR__ . '/../../common/config/main.php');

return [
    'id' => 'app-frontend',
    'language' => 'ru-RU',
    'basePath' => dirname(__DIR__),
    'defaultRoute' => 'site',
    'bootstrap' => ['log',
        // 'assetsAutoCompress'
    ],
    'controllerNamespace' => 'frontend\controllers',
    'language' => 'ru-Ru',
    'name' => 'cleveroptic',
    'modules' => [],
    'components' => [
        
       'assetsAutoCompress' => [
           'class' => '\skeeks\yii2\assetsAuto\AssetsAutoCompressComponent',
           'enabled' => false,
           'jsCompress' => false, //Enable minification js in html code
           'cssCompress' => false, //Enable minification css in html code
           'htmlFormatter' => [
               'class' => '\skeeks\yii2\assetsAuto\formatters\html\TylerHtmlCompressor',
               'extra' => false, //use more compact algorithm
               'noComments' => true, //cut all the html comments
           ],
       ],
        
        'request' => [
            'baseUrl' => '',
            'csrfParam' => '_csrf-frontend',
            'cookieValidationKey' => '8769LAKDJGN_(*AWE^$!Q',
        ],

        'user' => [
            'identityClass' => 'frontend\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => $common_config['components']['urlManagerFrontend'],
        'sphinx' => [
            'class' => 'yii\sphinx\Connection',
            'dsn' => 'mysql:host=127.0.0.1;port=9307;',
            'username' => '',
            'password' => '',
        ],
        'sort' => [
            'class' => 'frontend\component\SortComponent'
        ],
        'paramsFilter' => [
            'class' => 'frontend\component\ParamsFilterComponent'
        ]
    ],
    'modules' => [
        'user' => [
            'class' => 'frontend\modules\user\Module',
        ],

        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['192.168.10.1', '::1']
        ]
        
    ],
    'params' => $params,
];
