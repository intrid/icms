<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserData;

/**
 * UserDataSearch represents the model behind the search form of `common\models\UserData`.
 */
class UserDataSearch extends UserData
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'type_user'], 'integer'],
            [['user_fio', 'organization', 'address', 'phone', 'subscribe', 'unsubscribe', 'email'], 'safe'],
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
        $query = UserData::find();

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
            'user_id' => $this->user_id,
            'type_user' => $this->type_user,
        ]);

        $query->andFilterWhere(['like', 'user_fio', $this->user_fio])
            ->andFilterWhere(['like', 'organization', $this->organization])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'subscribe', $this->subscribe])
            ->andFilterWhere(['like', 'unsubscribe', $this->unsubscribe])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
