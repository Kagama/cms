<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 16.05.14
 * Time: 11:53
 */
namespace backend\modules\post;

class PostModule extends \common\modules\post\PostModule
{
    public $controllerNamespace = 'backend\modules\post\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
