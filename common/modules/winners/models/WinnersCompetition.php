<?php

namespace common\modules\winners\models;

use Yii;

/**
 * This is the model class for table "{{%winners_competition}}".
 *
 * @property integer $id
 * @property string $years
 * @property integer $type_id
 * @property string $name
 * @property string $description
 * @property integer $position
 */
class WinnersCompetition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%winners_competition}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['years', 'type_id', 'name', 'description'], 'required'],
            [['type_id', 'position'], 'integer'],
            [['description'], 'string'],
            [['years'], 'string', 'max' => 16],
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
            'years' => 'Год',
            'type_id' => 'Тип конкурса',
            'name' => 'Название',
            'description' => 'Описание',
            'position' => 'Позиция отображения',
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {

        if (isset($_POST['Winners']) && $this->getIsNewRecord()) {
            foreach ($_POST['Winners'] as $index => $row) {
                $winner = new Winners();
                $winner->name = $row['name'];
                $winner->description = $row['description'];
                $winner->place = ($index == 0 ? 'gold' : ($index == 1 ? "silver" : ($index == 2 ? "bronze" : "")));
                $winner->competition_id = $this->getPrimaryKey();
                $winner->save();
                unset($winner);
            }
        }

        $year = WinnersYears::find()->where(['year' => $this->years])->one();
        if (empty($year)) {
            $year = new WinnersYears();
            $year->year = $this->years;
            $year->save();
        }

        return parent::afterSave($insert, $changedAttributes);
    }

    public function getWinners()
    {
        return $this->hasMany(Winners::className(), ['competition_id' => 'id']);
    }

    public function getType()
    {
        return $this->hasMany(WinnersCompetitionType::className(), ['id' => 'type_id']);
    }
}
