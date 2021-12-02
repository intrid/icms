<?php
namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\goods\Good;
use yii\db\Expression;
use yii\db\Query;

/**
 * GoodsSearch represents the model behind the search form of `common\models\Goods`.
 */
class GoodSearch extends Good
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_t'], 'safe'],
            [['code_t'], 'safe'],
            [['visibility'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search( $params )
    {
        $query = Good::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load( $params );

        if ( ! $this->validate() ) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'name_t', $this->name_t]);
        $query->andFilterWhere(['like', 'code_t', $this->code_t]);

        $query->andFilterWhere([
            'visibility' => $this->visibility,
        ]);


        return $dataProvider;
    }

}
