<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'language' => 'ru-RU',
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@img'   => '/web/img',
        '@css'   => '/web/css',
    ],
    'components' => [
        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy', 
            'timeFormat' => 'hh:mm',           
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'S6jJ_6t7H00f6dHbVZhPPwd3nkFWDMk2',
            'baseUrl'=>'',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
                ''=>'index/index',
                '/'=>'index/index',
                '/admin'=>'admin/index',
                '/news'=>'news/index',
                '/admin/news/add-news'=>'admin/add-news',
                '/admin/news/drop-news/<id:([0-9]+)>'=>'admin/drop-news',
                '/admin/update-news/<id:([0-9]+)>'=>'admin/update-news',
                '/admin/news/delete-mainimage/<id:([0-9]+)>'=>'admin/delete-mainimage',
                '/admin/news/add-photo/<id:([0-9]+)>'=>'admin/add-photo-news',
                '/admin/news/delete-photo-news'=>'admin/delete-photo-news',
                '/admin/exit'=>'admin/exit',
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
