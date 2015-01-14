<?php

namespace common\modules\winners\models;

use Yii;

/**
 * This is the model class for table "{{%winners_competition_type}}".
 *
 * @property integer $id
 * @property string $name
 */
class WinnersCompetitionType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%winners_competition_type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Тип конкурса',
        ];
    }
}
