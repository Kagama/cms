<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'language' => 'ru',
//    'controllerNamespace' => 'backend\controllers',
    'defaultRoute' => 'admin/default',
    'bootstrap' => ['log'],
    'modules' => [
        'gii' => 'yii\gii\Module',
        'admin' => [
            'class' => 'backend\modules\admin\AdminModule',
        ],
        'pages' => [
            'class' => 'backend\modules\pages\PagesModule',
        ],
        'post' => [
            'class' => 'backend\modules\post\PostModule',
        ],
        'jury' => [
            'class' => 'backend\modules\jury\JuryModule',
        ],
        'menu' => [
            'class' => 'backend\modules\menu\MenuModule',
        ],
        'appmodule' => [
            'class' => 'backend\modules\appmodule\AppModule',
        ],

        'files' => [
            'class' => 'backend\modules\files\FileModule',
        ],
        'comment' => [
            'class' => 'backend\modules\comment\CommentModule'
        ],
        'user' => [
            'class' => 'backend\modules\user\UserModule',
        ],
        'contentBlock' => [
            'class' => 'backend\modules\contentBlock\ContentBlockModule'
        ],
        'layoutEditor' => [
            'class' => 'backend\modules\layoutEditor\LayoutEditorModule'
        ],
        'stage' => [
            'class' => 'backend\modules\stage\StageModule',
        ],
        'winners' => [
            'class' => 'backend\modules\winners\WinnersModule',
        ],
        'nomination' => [
            'class' => 'backend\modules\nomination\NominationModule',
        ],
    ],
    'components' => [
        'mail' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'session' => [
            'class' => 'yii\web\DbSession',
            'sessionTable' => 'frontend_session'
        ],
        'request' => [
            'cookieValidationKey' => 'sdNsa23Ms',
            'enableCsrfValidation'=>false,
            'baseUrl' => '/cp' // данный адрес соответсвует с тем адресом который мы задали в .htaccess из общего рута нашего приложения.
        ],

        'user' => [
            'identityClass' => 'common\modules\user\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => 'admin/default/login.html'
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@app/themes/lightblue',
                    '@app/modules' => '@app/themes/lightblue/modules', // <-- !!!
                ],
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
        'errorHandler' => [
            'errorAction' => 'admin/default/error',
        ],
        'assetManager' => [
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets',
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'js' => [''] // тут путь до Вашего экземпляра jquery
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '.html',
            'rules'=>[
                '<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ]
        ],
    ],
    'params' => $params,
];
