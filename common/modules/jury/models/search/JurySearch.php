<?php

namespace common\modules\jury\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\jury\models\Jury;

/**
 * JurySearch represents the model behind the search form about `common\modules\jury\models\Jury`.
 */
class JurySearch extends Jury
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'publish', 'position'], 'integer'],
            [['img', 'flp', 'bio'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Jury::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'publish' => $this->publish,
            'position' => $this->position
        ]);

        $query->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'flp', $this->flp])
            ->andFilterWhere(['like', 'bio', $this->bio]);

        return $dataProvider;
    }
}
