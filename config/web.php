<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    //bootstrap中制定了启动时需要运行的组件
    'bootstrap' => ['log'],
    //注册应用组件，应用组件只会在第一次访问时实例化， 如果处理请求过程没有访问的话就不实例化
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '3-VabcMO1FBj9Q8DFVT9mh2cpxQppDex',
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
        'db' => require(__DIR__ . '/db.php'),
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    //作用是指定controllerId到特定的控制器类(目前作用不大)
//    'controllerMap' => [
//            'account' => 'app\controllers\IndexController',
//            'article' => [
//                'class' => 'app\controllers\PostController',
//                'enableCsrfValidation' => false,
//            ],
//    ],
    //设置默认的控制器和动作 help, post/create 模块，控制器/动作
    'defaultRoute' => 'index/index',
    //指定给终端用户的语言
    'language' => 'en-US',
    //模块,模块的作用很大，可以将如用户管理，评论管理，可以开发成模块， 这样在相关项目中非常容易被重用。
    'modules' => [
        'forum' => [
            'class' => 'app\modules\forum\Module',
            // ... 模块其他配置 ...
        ],
    ],
    //包括全局访问的参数，是一个数组
    'params' => $params,
    //时区
    'timeZone' => 'Asia/Shanghai',
    //编码(默认不用修改)
//    'charset' => 'UTF-8',
    //默认使用的布局名字(默认不用修改)
//    'layouts' => 'main',
//    'layoutPath' => '@app/views/layouts',
//    'runtimePath' => '@app/runtime',
//    'vendorPath' => '@app/views',

    //事件
//    'on beforeInsert' => '类名'
//发送请求之前
//    'on beforeRequest' => function ($event) {
//        // ...
//    },
//发送请求之后
//    'on afterRequest' => function ($event) {
//        // ...
//    },
//执行动作之前
//    'on beforeAction' => function ($event) {
//
//    },
//执行动作之后
//    'on afterAction' => function ($event) {
//        if (some condition) {
//            // 修改 $event->result
//        } else {
//        }
//    },
    //行为
];

if (YII_ENV_DEV) {
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
