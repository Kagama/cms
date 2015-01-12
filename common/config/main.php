<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'extensions' => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),
    'language' => 'ru-RU',
    'modules' => [
        'gii' => 'yii\gii\Module',
        'redactor' =>  'sim2github\imperavi\Module',
    ],

    'components' => [
        'image' => [
            'class' => 'yii\image\ImageDriver',
            'driver' => 'GD',  //GD or Imagick
        ],
//        'view' => [
//            'class' => 'yii\web\View',
//
//            'renderers' => [
//                'tpl' => [
//                    'class' => 'yii\tal\ViewRenderer',
//
//                    //'cachePath' => '@runtime/Tal/cache',
//                ],
//            ],
//        ],
    ],
];
