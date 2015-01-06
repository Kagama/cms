<?php

namespace backend\modules\jury\controllers;

use common\modules\draft\models\Draft;

use Yii;
use common\modules\jury\models\Jury;
use common\modules\jury\models\search\JurySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\modules\user\models\User;
use yii\web\UploadedFile;

/**
 * DefaultController implements the CRUD actions for Jury model.
 */
class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],

            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete', 'remove-img'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'remove-img'],
//                        'roles' => ['@']
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


    public function actionRemoveImg()
    {
        $id = Yii::$app->request->get('id');
        $model = $this->findModel($id);
        if (empty($model)) {
            throw new NotFoundHttpException("Запись не найдена.");
        }

        $model->deletePhoto();
        Jury::updateAll(['img' => ''], ['id' => $model->id]);

        return $this->redirect(['update', 'id' => $model->id]);
    }

    /**
     * Lists all Jury models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JurySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Jury model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Jury model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Jury();

        if ($model->load(Yii::$app->request->post())) {


            if (isset($_POST['submit'])) {
                if ($_POST['submit'] == 'submit') {
                    if ($model->save()) {
                        if (Draft::addObj($model)) {
                            return $this->redirect(['view', 'id' => $model->id]);
                        }
                    } else {
                        return $this->redirect(['view', 'id' => $model->id]);
                    }

                }
                if ($_POST['submit'] == 'publish') {
                    Draft::removeObj($model);
                    $model->publish = 1;
                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }


    }

    /**
     * Updates an existing Jury model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if (isset($_POST['submit'])) {
                if ($_POST['submit'] == 'submit') {
                    if (Draft::addObj($model)) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
                if ($_POST['submit'] == 'publish') {

                    Draft::removeObj($model);
                    $model->publish = 1;

                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            }
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Jury model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Jury model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Jury the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Jury::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
