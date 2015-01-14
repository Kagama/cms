<?php

namespace backend\modules\winners\controllers;

use common\modules\user\models\User;
use common\modules\winners\models\Winners;
use Yii;
use common\modules\winners\models\WinnersCompetition;
use common\modules\winners\models\search\WinnersCompetitionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * DefaultController implements the CRUD actions for WinnersCompetition model.
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
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
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

    /**
     * Lists all WinnersCompetition models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WinnersCompetitionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WinnersCompetition model.
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
     * Creates a new WinnersCompetition model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WinnersCompetition();
        $winners = [new Winners(), new Winners(), new Winners()];

        if ($model->load(Yii::$app->request->post())) {

            if (isset($_POST['Winners'])) {
                foreach ($_POST['Winners'] as $index => $row) {
                    $winners[$index]->name = $row['name'];
                    $winners[$index]->description = $row['description'];
                }

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }
        return $this->render('create', [
            'model' => $model,
            'winners' => $winners,

        ]);

    }

    /**
     * Updates an existing WinnersCompetition model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $winners = $model->winners;

        if ($model->load(Yii::$app->request->post()) ) {

            if (isset($_POST['Winners'])) {
                foreach ($_POST['Winners'] as $index => $row) {
                    $winners[$index]->name = $row['name'];
                    $winners[$index]->description = $row['description'];
                    $winners[$index]->save();
                }

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'winners' => $winners
            ]);
        }
    }

    /**
     * Deletes an existing WinnersCompetition model.
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
     * Finds the WinnersCompetition model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WinnersCompetition the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WinnersCompetition::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
