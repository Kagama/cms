<?php

namespace common\modules\winners\models;

use Yii;

/**
 * This is the model class for table "{{%winners_years}}".
 *
 * @property integer $id
 * @property string $year
 */
class WinnersYears extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%winners_years}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year'], 'required'],
            [['year'], 'string', 'max' => 16]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'year' => 'Год',
        ];
    }
}
