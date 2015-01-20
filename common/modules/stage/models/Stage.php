<?php

namespace common\modules\stage\models;

use Yii;

/**
 * This is the model class for table "{{%competition_stage}}".
 *
 * @property integer $id
 * @property integer $number
 * @property string $title
 * @property string $url
 * @property string $note
 * @property string $date
 * @property integer $current_stage
 * @property integer $past_stage
 */
class Stage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%competition_stage}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number', 'title', 'date'], 'required'],
            [['number', 'current_stage', 'past_stage'], 'integer'],
            [['title', 'url', 'note'], 'string', 'max' => 512],
            [['url'], 'url'],
            [['date'], 'string', 'max' => 254]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Номер этапа',
            'title' => 'Название этапа',
            'url' => 'Ссылка на страницу этапа',
            'note' => 'Примечание',
            'date' => 'Дата проведения этапа',
            'current_stage' => 'Отметить как текущий этап',
            'past_stage' => 'Отметить как завершенный этап',
        ];
    }

    public function afterSave($insert, $changedAttr)
    {
        if ($this->current_stage == 1) {
            Stage::updateAll(['current_stage' => 0]);
            Stage::updateAll(['current_stage' => 1], 'id = ' . $this->getPrimaryKey());
        }
        return parent::afterSave($insert, $changedAttr);
    }
}
