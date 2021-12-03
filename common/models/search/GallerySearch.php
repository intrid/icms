<?php

namespace common\models\search;

use common\models\Gallery;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * GallerySearch represents the model behind the search form of `common\models\Country`.
 */
class GallerySearch extends Gallery
{
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['name'], 'safe'],
            [['visibility'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios(): array
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
        $query = Gallery::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['=', 'visibility', $this->visibility]);

        return $dataProvider;
    }
}
