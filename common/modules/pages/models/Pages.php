<?php

namespace common\modules\pages\models;

use Yii;
use common\helpers\CString;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "t_kg_pages".
 *
 * @property integer $id
 * @property string $title
 * @property string $file_name
 * @property string $text
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_kg_pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['text'], 'string'],
            [['title', 'file_name'], 'string', 'max' => 512],
            [['text'], 'string', 'max' => 9999999]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'file_name' => 'Название файла',
//            'small_text' => 'Краткое описание',
            'text' => 'Полный текст',
//            'seo_title' => 'Seo Заголовок',
//            'seo_keywords' => 'Seo Ключевые слова',
//            'seo_description' => 'Seo Описение',
        ];
    }

    public function beforeValidate()
    {
        if (parent::beforeValidate()) {
//            $this->alt_title = CString::translitTo($this->title);
            return true;
        }
        return false;
    }

    public function afterSave($insert, $changedAttr)
    {
//        if (isset($changedAttr['text'])) {

            file_put_contents(Yii::$app->basePath . '/../frontend/modules/pages/views/default/' . $this->file_name . ".php", $this->text);
//        }

        return parent::afterSave($insert, $changedAttr);
    }
}
