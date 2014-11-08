<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 23.06.14
 * Time: 20:11
 */
namespace frontend\modules\post\widgets;

use Yii;
use yii\base\Widget;

use common\modules\post\models\Post;

class PostList extends Widget {

    private $news_list = null;
    public function init() {
        $this->news_list = Post::find()->where(['publish' => 1])->orderBy('date DESC')->limit(4)->all();
    }

    public function run() {
        $this->renderContent();
    }

    private function renderContent() {
        echo $this->render('_news-list', ['news_list' => $this->news_list]);
    }
}