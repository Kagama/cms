<?php

namespace frontend\modules\jury;

use common\componets\myModule;
use common\modules\appmodule\models\Module;
use common\modules\menu\models\Menu;

class JuryModule extends myModule
{
    public $controllerNamespace = 'frontend\modules\jury\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function rules () {

        $module = Module::find()->where('module_name = :name', [':name' => "jury"])->one();
        $menuArr = Menu::find()->where('module_id = :m_id', ['m_id' => $module->id])->all();

        $url = "";
        $ruleArr = [];
        foreach ($menuArr as $item) {
            $ruleArr['<menu_url:('.str_replace("/", "\/",$item->url).')>'] = 'jury/default/index';
        }
        return $ruleArr;
    }
}
