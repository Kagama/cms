<?php
/**
 * Created by PhpStorm.
 * User: pashaevs
 * Date: 26.10.14
 * Time: 2:03
 */

namespace common\widget\html;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use common\modules\user\models\User;


//TODO: Реализовать редактирование элементов вывода на страница сайта.
class ActiveEdit extends Widget
{
    public $model = null;
    public $url = null;
    private $_user = null;

    public function init()
    {
        parent::init();
        ob_start();


        $this->_user = User::findIdentity(\Yii::$app->user->getId());
        if (!empty($this->_user) && $this->_user->role->id == 1) {

            \Yii::$app->controller->view->registerJs("
                $('.active-edit-block .edit-action-icon').fancybox({
                    //maxWidth	: 800,
                    //maxHeight	: 600,
                    type: 'iframe',
                    fitToView: false ,
                    width: '80%',
                    height: '70%',
                    autoSize: true,
                    closeClick: false,
                    openEffect: 'none',
                    closeEffect: 'none',
                    afterClose : function() {
                        location.reload();
                        return;
                    },
                    padding     : 0,
                    margin      : [20, 60, 20, 60]

                    //helpers : {
                    //    overlay: {
                    //        opacity: 0.8, // or the opacity you want
                    //        css: {'background-color': '#ff0000'} // or your preferred hex color value
                    //    } // overlay
                    //} // helpers
                });
            ");


            echo Html::beginTag('div', ['class' => 'active-edit-block']);
            echo Html::tag('a', '&nbsp;', ['class' => 'edit-action-icon', 'href' => Url::to([$this->url, 'id' => $this->model->id])]);
        }
    }

    public function run()
    {
        if (!empty($this->_user) && $this->_user->role->id == 1) {
            echo Html::endTag('div');
        }
        $content = ob_get_clean();
        return $content;
    }
}