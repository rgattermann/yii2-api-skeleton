<?php

$db = require __DIR__ . '/db.php';
$params = require __DIR__ . '/params.php';
$routes = require __DIR__ . '/routes.php';

$config = [
    'id' => 'onboarding-api',
    'name' => 'Onboarding Api',
    'version' => '1.0',
    'timezone' => 'America/Sao_Paulo',
    'bootstrap' => ['log'],
    'basePath' => dirname(__DIR__),
    'modules' => [
        'v1' => [
            'basePath' => '@app/Modules/v1',
            'class' => 'App\Modules\v1\ApiModule',
        ],
    ],
    'aliases' => [
        '@app' => dirname(__DIR__).'/src',
    ],
    'controllerNamespace' => 'App\Controllers',
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
            'enableCookieValidation' => false,
            'enableCsrfValidation' => false,
        ],
        'response' => [
            'format' => \yii\web\Response::FORMAT_JSON,
        ],

        'log' => [
            'traceLevel' => 3,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => \yii\rest\UrlRule::className(),
                    'pluralize' => false,
                    'controller' => [
                        'v1/hello'
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\w+>',
                    ],
                ],
                [
                    'class' => \yii\rest\UrlRule::className(),
                    'controller' => [
                        'v1/country'
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\w+>',
                    ],
                ],
                'v1/hello/<action:\\w+>' => 'v1/hello/<action>',
                'GET v1/hello/{id}' => 'v1/hello/view',
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    // uncomment the following to add your IP if you are not connecting from localhost.
    //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    // uncomment the following to add your IP if you are not connecting from localhost.
    //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
