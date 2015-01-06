<?php

namespace common\modules\jury\models;

use common\helpers\CDirectory;
use common\helpers\CString;
use common\modules\draft\models\Draft;
use Yii;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%jury}}".
 *
 * @property integer $id
 * @property string $img
 * @property string $flp
 * @property string $bio
 * @property integer $publish
 */
class Jury extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%jury}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['flp', 'bio'], 'required'],
            [['bio'], 'string'],
            [['publish'], 'integer'],
            [['img'], 'image', 'extensions' => 'jpg, jpeg, gif, png', 'skipOnEmpty' => true],
            [['flp'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Фото',
            'flp' => 'ФИО',
            'bio' => 'Биография',
            'publish' => 'Опубликовать',
        ];
    }

    public function uploadPhoto()
    {

        $img = UploadedFile::getInstance($this, 'img');
        if ($img instanceof UploadedFile && $img->size > 0) {
            $this->img = $img;
            $path = 'images/modules/jury';
            CDirectory::createDir($path);
            $dir = Yii::$app->basePath . "/../" . $path; //Yii::getAlias('@common/images/');
            $imageName = CString::translitTo($this->flp) . "." . $this->img->getExtension();

            $this->img->saveAs($dir . "/" . $imageName);
            $this->img = $path . "/" . $imageName;
        } else {
            $this->img = $this->getOldAttribute('img');
        }
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            $this->uploadPhoto();

            return true;
        }
        return false;
    }

    public function deletePhoto()
    {
        if (is_file(Yii::$app->basePath . "/../" . $this->img)) {
            return unlink(Yii::$app->basePath . "/../" . $this->img);
        }
        return false;
    }

    public function afterFind()
    {
        Draft::getDraftRecord($this);
    }
}
