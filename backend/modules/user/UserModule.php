<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 16.05.14
 * Time: 11:53
 */

namespace backend\modules\user;

class UserModule extends \common\modules\user\UserModule
{
    public $controllerNamespace = 'backend\modules\user\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
