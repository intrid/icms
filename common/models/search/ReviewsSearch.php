<?php

namespace common\models\search;

use common\models\Reviews;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Review;

/**
 * ReviewSearch represents the model behind the search form of `common\models\Review`.
 */
class ReviewsSearch extends Reviews
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'is_delete'], 'integer'],
            [['text'], 'safe'],
            [['name'], 'safe'],
            [['link'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Reviews::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_delete' => $this->is_delete,
            'is_published' => $this->is_published
        ]);

        $query->andFilterWhere(['like', 'text', $this->text]);
        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'link', $this->link]);

        return $dataProvider;
    }
}
