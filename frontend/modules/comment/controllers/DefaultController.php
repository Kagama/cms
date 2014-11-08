<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 01.07.14
 * Time: 17:38
 */

namespace frontend\modules\comment\controllers;

use frontend\modules\comment\models\CommentForm;
use yii\helpers\Json;
use yii\web\Controller;
use Yii;

class DefaultController extends Controller {

    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionAdd() {

        $commentForm = new CommentForm();

//        if (\Yii::$app->request->isAjax) {
//            if (Yii::$app->user->isGuest)
//                return Json::encode(['error' => true, 'message' => 'Для того что бы добавить комментарий Вам необходимо войти на сайт или зарегистрироваться']);

            if ($commentForm->load(Yii::$app->request->post()) && $commentForm->saveComment()) {
                echo Json::encode(['error' => false, 'message' => 'Спасибо за добавленный комментарий!']);
                Yii::$app->end();
            } else {
                return Json::encode(['error' => true, 'message' => $commentForm->getErrors()]);
            }
//        }
    }
}