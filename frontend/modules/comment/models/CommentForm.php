<?php

namespace frontend\modules\comment\models;

use common\modules\comment\models\Comment;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class CommentForm extends Model
{
    public $email;
    public $text;
    public $model_name;
    public $model_id;
    public $parent_id;
    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['text', 'email'], 'required'],
            [['model_id', 'parent_id'], 'integer'],
            [['text'], 'string'],
            [['model_name'], 'string', 'max' => 512],
            [['email'], 'email'],
            ['verifyCode', 'captcha', 'captchaAction'=> '/comment/default/captcha']
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'EMail',
            'date' => 'Дата',
            'text' => 'Текст',
            'publish' => 'Опубликовать',
            'verifyCode' => 'Капча',
            'parent_id' => 'parent_id'
        ];
    }

    public function saveComment() {
        $model = new Comment();
        $model->email = $this->email;
        $model->text = $this->text;
        $model->date = time();
        $model->model_name = $this->model_name;
        $model->model_id = $this->model_id;
        $model->parent_id = $this->parent_id;

        return $model->save();
    }


}