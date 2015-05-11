<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sindicatura;

/**
 * SindicaturaSearch represents the model behind the search form about `app\models\Sindicatura`.
 */
class SindicaturaSearch extends Sindicatura
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sindicatura_id', 'municipio_id'], 'integer'],
            [['sindicatura_nombre'], 'safe'],
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
        $query = Sindicatura::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'sindicatura_id' => $this->sindicatura_id,
            'municipio_id' => $this->municipio_id,
        ]);

        $query->andFilterWhere(['like', 'sindicatura_nombre', $this->sindicatura_nombre]);

        return $dataProvider;
    }
}
