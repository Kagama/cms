<?php

namespace frontend\modules\comment;
use common\componets\myModule;

class CommentModule extends myModule
{
    public $controllerNamespace = 'frontend\modules\comment\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function rules () {
        return [
            'comment/add' => 'comment/default/add',
            'comment/captcha' => 'comment/default/captcha',
        ];
    }
}
