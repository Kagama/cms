<?php
/**
 * Created by PhpStorm.
 * User: pashaevs
 * Date: 03.01.15
 * Time: 18:00
 */

namespace frontend\modules\jury\controllers;

use common\modules\jury\models\Jury;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $juries = Jury::find()->orderBy('position ASC')->all();

        return $this->render('index', ['juries' => $juries]);
    }
}