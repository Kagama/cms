<?php

namespace frontend\modules\winners;

use common\componets\myModule;

class WinnersModule extends myModule
{
    public $controllerNamespace = 'frontend\modules\winners\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }


    public function rules () {

        $ruleArr = [
            'past-winners' => 'winners/default/index',
            'past-winners/<year:\d+>' => "winners/default/index",
        ];

        return $ruleArr;
    }
}
