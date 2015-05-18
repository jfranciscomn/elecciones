<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClaseIncidente;

/**
 * ClaseIncidenteSearch represents the model behind the search form about `app\models\ClaseIncidente`.
 */
class ClaseIncidenteSearch extends ClaseIncidente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clase_incidente_id'], 'integer'],
            [['clase_incidente_nombre'], 'safe'],
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
        $query = ClaseIncidente::find();

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
            'clase_incidente_id' => $this->clase_incidente_id,
        ]);

        $query->andFilterWhere(['like', 'clase_incidente_nombre', $this->clase_incidente_nombre]);

        return $dataProvider;
    }
}
