<?php

namespace common\modules\winners\models;

use Yii;

/**
 * This is the model class for table "{{%winners}}".
 *
 * @property integer $id
 * @property string $place
 * @property string $name
 * @property string $description
 * @property integer $competition_id
 */
class Winners extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%winners}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'competition_id'], 'required'],
            [['description'], 'string'],
            [['competition_id'], 'integer'],
            [['place'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'place' => 'Место',
            'name' => 'Название',
            'description' => 'Описание',
            'competition_id' => 'Конкурс',
        ];
    }
}
