<?php

namespace frontend\modules\pages\controllers;

use common\modules\menu\models\Menu;
use common\modules\pages\models\Pages;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class DefaultController extends Controller
{
    public function actionShow($menu_url)
    {
        $menu = Menu::find()->where('url = :url', [':url' => $menu_url])->one();

        $model = Pages::findOne($menu->module_model_id);

        if (!is_file(\Yii::$app->basePath ."/../frontend/modules/pages/views/default/".$model->file_name.".php")) {
            throw new NotFoundHttpException('Страница не найдена');
        }

        return $this->render($model->file_name, [
            'model' => $model,
            'menu' => $menu
        ]);
    }

    public function actionContact()
    {
        return $this->render('contact');
    }
}
