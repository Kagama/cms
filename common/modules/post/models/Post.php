<?php

namespace common\modules\post\models;

use common\helpers\CString;
use common\modules\comment\models\Comment;
use common\modules\draft\models\Draft;
use common\modules\menu\models\Menu;
use common\modules\user\models\User;
use Yii;
use yii\web\Cookie;

/**
 * This is the model class for table "t_kg_post".
 *
 * @property integer $id
 * @property string $title
 * @property string $alt_title
 * @property string $small_text
 * @property string $text
 * @property integer $date
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * @property integer $user_id
 * @property integer $publish
 * @property integer $views_count
 * @property integer $menu_id
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_kg_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'date'], 'required'],
            [['small_text', 'text', 'seo_description'], 'string'],
            [['user_id', 'publish', 'views_count', 'menu_id'], 'integer'],
//            [['date'], 'integer'],
            [['title', 'alt_title', 'seo_title', 'seo_keywords'], 'string', 'max' => 512],
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
            'alt_title' => 'Альт заголовок',
            'small_text' => 'краткое описание',
            'text' => 'плоный текст',
            'date' => 'Дата',
            'seo_title' => 'Seo Title',
            'seo_keywords' => 'Seo Keywords',
            'seo_description' => 'Seo Description',
            'user_id' => 'Пользователь',
            'publish' => 'Публиковать',
            'views_count' => 'Количество просмотров',
            'menu_id' => 'Меню'
        ];
    }

    public function beforeValidate()
    {
        if (parent::beforeValidate()) {
            $this->alt_title = CString::translitTo($this->title);
            $this->date = strtotime($this->date);
            return true;
        }
        return false;
    }

    public function afterFind()
    {
        Draft::getDraftRecord($this);

        if (is_numeric($this->date)) {
            $this->date = date("d-m-Y", $this->date);
        }
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function setCookie()
    {
        if (Yii::$app->request->cookies->has('post_viewed_id')) {
            $cookie = Yii::$app->request->cookies->get('post_viewed_id');

            $value = unserialize($cookie->value);
            if (!in_array($this->id, $value)) {
                $this->views_count += 1;
                $this->save();

                $value[] = $this->id;
                $cookie->value = serialize($value);
                $cookie->expire = time() + 2592000; // 30 дней хранить cookie о просмотре новости
                Yii::$app->response->cookies->add($cookie);
            }

        } else {
            $this->views_count += 1;
            $this->save();

            $cookie = new Cookie();
            $cookie->name = 'post_viewed_id';
            $cookie->value = serialize([$this->id]);
            $cookie->expire = time() + 2592000; // 30 дней хранить cookie о просмотре новости
            Yii::$app->response->cookies->add($cookie);
        }
    }

    public function getCommentCount()
    {
        $comment = Comment::find()->where('model_name = :name and model_id = :id ', [':name' => $this->className(), ':id' => $this->getPrimaryKey()])->count();
        return $comment;
    }

    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['id' => 'menu_id']);
    }
}
