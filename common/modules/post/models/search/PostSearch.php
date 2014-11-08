<?php

namespace common\modules\post\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\post\models\Post;

/**
 * PostSearch represents the model behind the search form about `common\modules\post\models\Post`.
 */
class PostSearch extends Post
{
    public function rules()
    {
        return [
            [['id', 'date', 'user_id', 'publish', 'menu_id'], 'integer'],
            [['title', 'alt_title', 'small_text', 'text', 'seo_title', 'seo_keywords', 'seo_description', 'user_id'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Post::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'user_id' => $this->user_id,
//            'publish' => $this->publish,
            'menu_id' => $this->menu_id
        ]);



        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'alt_title', $this->alt_title])
            ->andFilterWhere(['like', 'small_text', $this->small_text])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'seo_title', $this->seo_title])
            ->andFilterWhere(['like', 'seo_keywords', $this->seo_keywords])
            ->andFilterWhere(['like', 'seo_description', $this->seo_description]);

        return $dataProvider;
    }
}
