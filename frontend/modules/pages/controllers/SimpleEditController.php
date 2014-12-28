<?php
/**
 * Created by PhpStorm.
 * User: pashaevs
 * Date: 28.10.14
 * Time: 13:39
 */

namespace frontend\modules\pages\controllers;

use common\modules\draft\models\Draft;
use Yii;
use common\modules\pages\models\Pages;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\modules\user\models\User;

class SimpleEditController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'delete' => ['post'],
                ],

            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['edit'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['edit', 'view'],
                        'matchCallback' => function ($rule, $action) {
                            $model = User::findIdentity(Yii::$app->user->getId());
                            if (!empty($model)) {
                                return $model->role->id == 1; // Администратор
                            }
                            return false;
                        }
                    ]
                ]
            ]
        ];
    }

    public function actionEdit($id)
    {

        Yii::$app->setLayoutPath("@app/themes/basic/layouts/simple");
        $model = $this->findModel((int)$id);

        if (empty($model))
            throw new NotFoundHttpException('Запись не найдена.');

        if ($model->load(Yii::$app->request->post())) {
            if (isset($_POST['submit'])) {
                if ($_POST['submit'] == 'submit') {
                    if (Draft::addObj($model)) {
                        $this->redirect(['view', 'id' => $id]);
                    }
                }
                if ($_POST['submit'] == 'publish') {

                    Draft::removeObj($model);
                    $model->publish = 1;

                    if ($model->save()) {
                        $this->redirect(['view', 'id' => $id]);
                    }
                }
            }

        }

        return $this->render('edit', ['model' => $model]);

    }

    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        Yii::$app->setLayoutPath("@app/themes/basic/layouts/simple");

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Pages::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
