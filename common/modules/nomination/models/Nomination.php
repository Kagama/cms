<?php

namespace common\modules\nomination\models;

use Yii;

/**
 * This is the model class for table "{{%nomination}}".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $link
 * @property integer $position
 * @property string $text
 * @property string $intro
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 */
class Nomination extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%nomination}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'category_id'], 'required'],
            [['position', 'category_id'], 'integer'],
            [['text', 'seo_description', 'intro'], 'string'],
            [['name', 'link', 'seo_title', 'seo_keywords'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'link' => 'Ссылка',
            'position' => 'Позиция отображения',
            'text' => 'Описание номинации',
            'intro' => 'Краткое описание',
            'category_id' => 'Категория',
            'seo_title' => 'Seo Заголовок',
            'seo_keywords' => 'Seo Ключевые слова',
            'seo_description' => 'Seo Описание',
        ];
    }

    public function getCategory() {
        return self::hasOne(NominationCategory::className(), ['id' => 'category_id']);
    }
}
