<?php

namespace common\modules\comment\models;

use Yii;

/**
 * This is the model class for table "t_kg_comment".
 *
 * @property integer $id
 * @property string $email
 * @property integer $date
 * @property string $text
 * @property integer $user_id
 * @property integer $parent_id
 * @property integer $level
 * @property string $model_name
 * @property integer $model_id
 * @property integer $publish
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_kg_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'date', 'text', 'model_name', 'model_id'], 'required'],
            [['date', 'user_id', 'publish', 'parent_id', 'level', 'model_id'], 'integer'],
            [['text'], 'string'],
            [['email'], 'email'],
            [['model_name'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'EMail',
            'date' => 'Дата',
            'text' => 'Текст',
            'user_id' => 'Пользователь',
            'parent_id' => 'Владелец',
            'level' => 'Уровень',
            'model_name' => 'Название модели',
            'model_id' => 'Номер модели',
            'publish' => 'Опубликовать'
        ];
    }

    public function beforeValidate() {
        if (parent::beforeValidate()) {
            if ($this->parent_id != null) {
                $obj = Comment::findOne($this->parent_id);
                $this->level = empty($obj) ? 0 : ($obj->level + 1);

            }
            $this->date = strtotime($this->date);
            return true;
        }
        return false;
    }

    public function afterFind() {
        $this->date = date("d-m-Y", $this->date);
    }
}
