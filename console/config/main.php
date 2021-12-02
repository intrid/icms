<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
          ],
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'urlManagerFrontend' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'baseUrl' => '/',
            'rules' => [
                '/' => 'site/index',
                '/search' => 'submit/search',
                '/catalog' => '/category',
                '/favorit' => '/category/favorit',
                [
                    'class' => \frontend\component\PageRule::class,
                ],
                [
                    'class' => \frontend\component\ArticleRule::class,
                ],
                [
                    'class' => \frontend\component\StockRule::class,
                ],
                [
                    'class' => \frontend\component\CategoryRule::class,
                ],
            ],
        ],
        'sphinx' => [
            'class' => 'yii\sphinx\Connection',
            'dsn' => 'mysql:host=127.0.0.1;port=9307;',
            'username' => '',
            'password' => '',
        ],
    ],
    'params' => $params,
];
