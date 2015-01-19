<?php

namespace common\modules\participant\models;

use common\modules\nomination\models\Nomination;
use Yii;

/**
 * This is the model class for table "t_kg_participant_of_competition".
 *
 * @property integer $id
 * @property string $brand_name
 * @property string $company_name
 * @property integer $nomination_id
 * @property integer $seminar
 * @property string $first_name
 * @property string $last_name
 * @property string $job
 * @property string $phone
 * @property string $email
 * @property integer $reg_date
 */
class ParticipantOfCompetition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_kg_participant_of_competition';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand_name', 'company_name', 'nomination_id', 'seminar', 'first_name', 'last_name', 'job', 'phone', 'email'], 'required'],
            [['nomination_id', 'seminar', 'reg_date'], 'integer'],
            [['brand_name', 'company_name', 'first_name', 'last_name', 'job', 'phone', 'email'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_name' => 'Название брэнда',
            'company_name' => 'Название компании',
            'nomination_id' => 'Номинация',
            'seminar' => 'Участвовать в семинаре',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'job' => 'Должность',
            'phone' => 'Номер телефона',
            'email' => 'Электронная почта',
            'reg_date' => 'Дата регистрации'
        ];
    }

    public function getNomination() {
        return self::hasOne(Nomination::className(), ['id' => 'nomination_id']);
    }
}
