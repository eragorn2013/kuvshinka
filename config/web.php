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
        '@js'   => '/web/js',
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
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => '6Lfc6Z8UAAAAAF4vy9Pt2oDK3eYxtNvVzQaXJ2I4',
            'secret' => '6Lfc6Z8UAAAAAElZT7mFgmuRC8UNjL6a8fwqRu-i',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com', //смотреть данные на яндексе (или гугле)
                'username' => 'kuvshinkaclubsite@gmail.com', //логин и пароль почты через которую будет отправка
                'password' => '159875321Kuvshinka',
                'port' => '465', //смотреть данные на яндексе (или гугле)
                'encryption' => 'SSL' //смотреть данные на яндексе (или гугле)
            ],
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
                '/aboutus'=>'aboutus/index',
                '/'=>'admin/send-order',
                '/contacts'=>'contacts/index',
                '/admin/update-seo/<id:([0-9]+)>'=>'admin/update-seo',
                '/conditions'=>'conditions/index',
                '/news/<id:([0-9]+)>'=>'news/news-current',
                '/admin/news/add-news'=>'admin/add-news',
                '/admin/news/drop-news/<id:([0-9]+)>'=>'admin/drop-news',
                '/admin/update-news/<id:([0-9]+)>'=>'admin/update-news',
                '/admin/news/delete-mainimage/<id:([0-9]+)>'=>'admin/delete-mainimage',
                '/admin/news/add-photo/<id:([0-9]+)>'=>'admin/add-photo-news',
                '/admin/news/delete-photo-news'=>'admin/delete-photo-news',
                '/admin/gallery/add-img'=>'admin/add-image',
                '/admin/gallery/delete-image/<id:([0-9]+)>'=>'admin/delete-image',
                '/admin/send-order'=>'admin/send-order',
                '/admin/send-order/popup'=>'admin/send-order-popup',
                '/admin/send-order/about'=>'admin/send-order-about',
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
