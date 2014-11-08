<?php

namespace frontend\modules\post;

use common\componets\myModule;
use common\modules\appmodule\models\Module;
use common\modules\menu\models\Menu;

class PostModule extends myModule
{
    public $controllerNamespace = 'frontend\modules\post\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function rules () {

        $module = Module::find()->where('module_name = :name', [':name' => "post"])->one();
        $menuArr = Menu::find()->where('module_id = :m_id', ['m_id' => $module->id])->all();

        $url = "";
        foreach ($menuArr as $menu) {
            $url .= (empty($url) ? "" : "|" ).$menu->alt_name;
        }
        $ruleArr = [
            '<menu_alt_name:('.($url == "" ? "post" : $url).')>' => 'post/default/all',
            '<menu_alt_name:('.($url == "" ? "post" : $url).')>/<id_alt_title:\w+>' => "post/default/show",
        ];
//        print_r($ruleArr);
//        die();
        return $ruleArr;
    }
}
