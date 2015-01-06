<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'language' => 'ru',
//    'bootstrap' => ['log', 'gii'],
//    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'main/default/index',
    'bootstrap' => ['gii'],
    'modules' => [
        'gii' => 'yii\gii\Module',
        'post' => [
            'class' => 'frontend\modules\post\PostModule',
        ],
        'pages' => [
            'class' => 'frontend\modules\pages\PagesModule',
        ],
        'user' => [
            'class' => 'frontend\modules\user\UserModule',
        ],
        'main' => [
            'class' => 'frontend\modules\main\MainModule',
        ],
        'jury' => [
            'class' => 'frontend\modules\jury\JuryModule',
        ],
        'comment' => [
            'class' => 'frontend\modules\comment\CommentModule',
        ],
        'contentBlock' => [
            'class' => 'frontend\modules\contentBlock\ContentBlockModule'
        ],
//        'stage' => [
//            'class' => 'frontend\modules\stage\StageModule',
//        ],
    ],
    'as myDModuleUrlRulesBehavior' => [
        'class' => 'common\behaviors\DModuleUrlRulesBehavior',
    ],
    'components' => [
        'mail' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
        ],
        'session' => [
            'class' => 'yii\web\DbSession',
            'sessionTable' => 'frontend_session'
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@app/themes/basic',
                    '@app/modules' => '@app/themes/basic/modules', // <-- !!!
                ],
            ],
        ],
        'request' => [
            'cookieValidationKey' => 'sdNsa23Ms',
            'enableCsrfValidation'=>false,
            'baseUrl' => '' // данный адрес соответсвует с тем адресом который мы задали в .htaccess из общего рута нашего приложения.
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '.html',
            'rules'=>[

//                '<module:(news|article)>/all' => '<module>/default/all',
//                '<module:(news|article)>/<id_alt_title:\w+>' => '<module>/default/show',

//                '<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
//                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ]
        ],
        'user' => [
            'identityClass' => 'common\modules\user\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => 'main/default/login.html'
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
            'errorAction' => 'main/default/error',
        ],
        'assetManager' => [
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets',
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'js' => [
                        'js/jquery-2.1.0.min.js'
                    ],
                ],
            ]
        ]
    ],
    'params' => $params,
];


