<?php

namespace frontend\modules\post\controllers;

use common\modules\menu\models\Menu;
use common\modules\post\models\Post;
use common\modules\post\models\search\PostSearch;
use frontend\modules\comment\models\CommentForm;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class DefaultController extends Controller
{
//    public function actions()
//    {
//        return [
//            'captcha' => [
//                'class' => 'yii\captcha\CaptchaAction',
//                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
//            ],
//        ];
//    }

    public function actionAll($menu_alt_name)
    {

        $menu = Menu::find()->where('alt_name = :alt_name', [':alt_name' => $menu_alt_name])->one();

        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        $dataProvider->query->andFilterWhere(['menu_id' => $menu->id]);

        if (Yii::$app->user->isGuest) {
            $dataProvider->query->andFilterWhere(['publish' => 1]);
        }

        $dataProvider->pagination->pageSize = 6;


        return $this->render('all', ['dataProvider' => $dataProvider, 'menu' => $menu]);
    }

    public function actionShow($menu_alt_name, $id_alt_title)
    {

        $menu = Menu::find()->where('alt_name = :alt_name', [':alt_name' => $menu_alt_name])->one();

        $explode = explode("_", $id_alt_title);
        $model = Post::findOne((int)$explode[0]);
        if (empty($model))
            throw new NotFoundHttpException('Новость не надейна.', 404);

        $model->setCookie();
        $commentForm = new CommentForm();
        return $this->render('show', ['model' => $model, 'commentForm' => $commentForm, 'menu' => $menu]);
    }

//    public function actionCategory($menu_alt_name, $cat_alt = null)
//    {
//        $menu = Menu::find()->where('alt_name = :alt_name', [':alt_name' => $menu_alt_name])->one();
//
//        $category = Category::find()->where('alt_name = :name', [':name' => $cat_alt])->one();
//        if ($category == null)
//            throw new NotFoundHttpException('Страница не найдена.');
//
//        $searchModel = new NewsSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
//        $dataProvider->pagination->pageSize = 6;
//        $dataProvider->query->andFilterWhere(['category_id' => $category->id]);
//
//        return $this->render('category', ['dataProvider' => $dataProvider, 'category' => $category, 'menu' => $menu]);
//    }
}
