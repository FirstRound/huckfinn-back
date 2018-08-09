<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'huckfinn',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'en',
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\AdminModule',
        ],
        'user' => [
            'class' => 'app\modules\user\UserModule',
        ],
        'field' => [
            'class' => 'app\modules\field\FieldModule',
        ],
        'pages' => [
            'class' => 'app\modules\pages\Pages',
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '123',
        ],
        'assetManager' => [
            'appendTimestamp' => true,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'cache' => 'cache'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\modules\user\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'site/index',
                'tickets' => 'site/tickets',
                'want-to' => 'site/volunteer',
                'map' => 'site/map',
                'MeetTheHUCKERS' => 'site/meet',
                'TRAVEL' => 'site/travel',
                'CampingAndParking' => 'site/camping',
                'attraction' => 'site/attraction',
                'line-up' => 'site/lineup',
                'faq' => 'site/faq',
                'rules-and-regulations' => 'site/rules',

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
