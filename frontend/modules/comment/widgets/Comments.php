<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 01.07.14
 * Time: 14:57
 */
namespace frontend\modules\comment\widgets;


use common\modules\comment\models\Comment;
use frontend\modules\comment\models\CommentForm;
use yii\base\Widget;

class Comments extends Widget {

    public $model;
    public $count = 4;
    private $comArr;

    public function init() {

        $comments = Comment::find()->
            where(' model_name = :model_name and model_id = :model_id and publish = 1 ', [
                ':model_name' => $this->model->className(),
                ':model_id' => $this->model->getPrimaryKey()
            ])->
            orderBy('date ASC')->
            all();
        $commentForm = new CommentForm();

        $this->prepareTreeToArrayObj($comments, null);

        echo $this->render('_comments', ['comments' => $this->comArr, 'model' => $this->model, 'commentForm' => $commentForm]);
    }

    private function prepareTreeToArrayObj($array, $parent_id) {
        foreach($array as $obj) {
            if ($obj->parent_id == $parent_id) {
                $this->comArr[] = $obj;
                $this->prepareTreeToArrayObj($array, $obj->id);
            }
        }
        return;
    }


}